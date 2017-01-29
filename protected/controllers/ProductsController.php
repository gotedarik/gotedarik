<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */



    public $layout = "frontLayout/frontlayout";

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$supplierid=Yii::app()->user->getState("supplier_id");

		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create',"createproduct"),
				'expression' => array('AllowExpression','allowOnlySupplier')
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('newproduct','searchgroups','getproductgroupstep','salestype','salestypeset','salestypebuild','productinformations','productimageadd','productinformationsave','productreview','productpayment','confirm','list','customize'),
				'expression' => array('AllowExpression','allowOnlySupplier')
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression' => array('AllowExpression','allowOnlySupplier')
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'users' => array('*')
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('re'),
				'expression' => array('AllowExpression','allowOnlyAdmin')
			),

			array('deny',  // deny all users
				'users'=>array('*'),
				'deniedCallback' => function() {$this->redirect(array ('site/giris'));},
			),
		);
	}



	public function actionCustomize($id)
	{
		$model=$this->loadModelCode($id);

		Yii::app()->user->setState("products_id",$model->products_id);
		$this->redirect(array("products/newproduct"));
	}

	public function actionList()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		$model->viewok=1;
		$model->suppliers_id=Yii::app()->user->getState("supplier_id");

		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('list',array(
			'model'=>$model,
		));
	}

	public function actionConfirm()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
		
			$modelProduct=$this->loadModel(Yii::app()->user->getState("products_id"));
			$modelProduct->status=1;
			$modelProduct->viewok=$this->productviewok($modelProduct);
			$modelProduct->update();

			$MoProducts=new MoProducts;
			$MoProducts->update($modelProduct->products_id,$MoProducts->buildArr($modelProduct));

			Yii::app()->user->setState("products_id",null);
			Yii::app()->user->setState("salestype",null);
			$data["sonuc"]=1;

			echo json_encode($data);
		}
	}

	public function actionProductreview()
	{

		if(empty(Yii::app()->user->getState("products_id")))
		{
			$this->redirect(array("newproduct"));
		}

		/*
		if(empty(Yii::app()->user->getState("salestype")))
		{
			$this->redirect(array("salestype"));
		}
		*/

		$modelProduct=$this->loadModel(Yii::app()->user->getState("products_id"));

		if(empty($modelProduct->name))
		{
			$this->redirect(array("productinformations"));
		}

		$criteria=new CDbCriteria;
		$criteria->condition = "products_id=:products_id";
		$criteria->params = array (	
			':products_id' =>$modelProduct->products_id,
		);
		$criteria->order="imagetype asc";

		$modelProductimages=Productimages::model()->findAll($criteria);

		
		$modelSupplierscompany=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));

		$arrimages=array();

		foreach($modelProductimages as $key=>$value)
		{
		
			$arrimages[]=array(
				"imageS"=>Yii::app()->params["cdn"].$value->imageS,
				"imageL"=>Yii::app()->params["cdn"].$value->imageL,
				"imageXL"=>Yii::app()->params["cdn"].$value->imageXL,
				"productimages_id"=>$value->productimages_id,
			);
			
		}

		
		$this->render("productreview",array(
			"modelProduct"=>$modelProduct,
			"arrimages"=>$arrimages,
			'modelSupplierscompany'=>$modelSupplierscompany

		));


	}


	public function actionProductinformationsave()
	{
		if(Yii::app()->request->isAjaxRequest)
		{

			$dt=json_decode(urldecode($_POST["data"]));
			$dttext=$_POST["text"];

			$criteria=new CDbCriteria;
			$criteria->condition = "products_id=:products_id && imagetype=:imagetype";
			$criteria->params = array (	
				':imagetype' =>0,
				':products_id' => Yii::app()->user->getState("products_id"),
			);


			$modelProductimages=Productimages::model()->findAll($criteria);

			if(count($modelProductimages)==0)
			{
				$data["sonuc"]=2;

				echo json_encode($data);
				exit;
			}

			$model=$this->loadModel(Yii::app()->user->getState("products_id"));

			if(count($model)>0)
			{

				$model->text=Func::removeTags($dttext);
				$model->name=Func::xssClear($dt->name);
				$model->subtitle=Func::xssClear($dt->subtitle);

				$model->updatedateadd=date("Y-m-d H:i:s");
				$model->currency=$dt->currency;
				$model->discount=$dt->discount;
				if(!empty($dt->price))
				{
					$model->price=$dt->price;
				}
				
				
				if($model->salestype==2)
				{

					$model->startingprice=$dt->startingprice;
					$model->price=$dt->startingprice;
				}
				//$model->piece=$dt->piece;
				//$model->cargopricetype=$dt->cargopricetype;
				//$model->cargoprice=$dt->cargoprice;
				if($model->salestype==1)
				{
					$model->lastshowday=$dt->lastshowday;
					$model->lastbidday="";

					$model->lastshowdates=date("Y-m-d H:i:s",strtotime('+'.$dt->lastshowday.'day', strtotime(date('Y-m-d H:i:s'))));
				}else{
					$model->lastshowday="";
					$model->lastbidday=$dt->lastbidday;

					$model->lastshowdates=date("Y-m-d H:i:s",strtotime('+'.$dt->lastbidday.'day', strtotime(date('Y-m-d H:i:s'))));
				}

				$model->viewok=$this->productviewok($model);

				if($model->update())
				{
					$MoProducts=new MoProducts;
					$MoProducts->update($model->products_id,$MoProducts->buildArr($model));

					$data["sonuc"]=1;
				}else{
					$data["sonuc"]=0;
				}

				

			}

			echo json_encode($data);
		}
	}



	public function  actionProductimageadd()
	{
		$data["sonuc"]=0;
		$func=new Func;
		
		if(Yii::app()->request->isAjaxRequest && isset($_GET["imagetype"]) && isset($_FILES['upl']['tmp_name']) && $func->fileTypeControl2($_FILES['upl']["type"]))
		{
			

			if(empty(Yii::app()->user->getState("product_id")))
			{
				
				$image=$_FILES['upl']['tmp_name'];
				imagejpeg(imagecreatefromstring(file_get_contents($image)),$image);
				

				$h1=$func->getHashCode(4,8)."_".time();
				$imagename1="productimages/".Yii::app()->user->getState("products_id")."_".$h1."_".$_GET["imagetype"]."_1.jpg";

				$imagename2="productimages/".Yii::app()->user->getState("products_id")."_".$h1."_".$_GET["imagetype"]."_2.jpg";

				$imagename3="productimages/".Yii::app()->user->getState("products_id")."_".$h1."_".$_GET["imagetype"]."_3.jpg";

				$imagename4="productimages/".Yii::app()->user->getState("products_id")."_".$h1."_".$_GET["imagetype"]."_4.jpg";

				$resize = new ResizeImage($image);
				$resize->resizeTo(800, 800, 'maxWidth');
				$resize->saveImage($image);

				$s31=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename1);


				$resize = new ResizeImage($image);
				$resize->resizeTo(500, 500, 'maxWidth');
				$resize->saveImage($image);

				$s32=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename2);


				$resize = new ResizeImage($image);
				$resize->resizeTo(300, 300, 'maxWidth');
				$resize->saveImage($image);
				
				$s33=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename3);


				$resize = new ResizeImage($image);
				$resize->resizeTo(240, 240, 'maxWidth');
				$resize->saveImage($image);
				
				$s34=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename4);

				$criteria=new CDbCriteria;
				$criteria->condition = "products_id=:products_id && imagetype=:imagetype";
				$criteria->params = array (	
					':imagetype' =>$_GET["imagetype"],
					':products_id' => Yii::app()->user->getState("products_id"),
				);


				$modelRe=Productimages::model()->findAll($criteria);
				$deleteids=array();

				foreach($modelRe as $key=>$value)
				{
					$deleteids[]=$value->productimages_id;
				}

				$model=new Productimages;
				$model->products_id=Yii::app()->user->getState("products_id");
				$model->imagetype=$_GET["imagetype"];

				$model->imageXL=$imagename1;
				$model->imageXL_s3url=$s31["url"];

				$model->imageL=$imagename2;
				$model->imageL_s3url=$s32["url"];

				$model->imageM=$imagename3;
				$model->imageM_s3url=$s33["url"];


				$model->imageS=$imagename4;
				$model->imageS_s3url=$s34["url"];

				if($model->save())
				{
					$data["sonuc"]=1;

					foreach($deleteids as $key=>$value)
					{
						$modelDe=Productimages::model()->findByPk($value);
						$imgs=array();
						$imgs[]=$modelDe->imageXL;
						$imgs[]=$modelDe->imageL;
						$imgs[]=$modelDe->imageM;
						$imgs[]=$modelDe->imageS;

						AmazonFunc::delete($imgs);

						$modelDe->delete();
					}


					if($model->imagetype==1)
					{
						$data["image"]=Yii::app()->params["cdn"].$model->imageL;
					}else{
						$data["image"]=Yii::app()->params["cdn"].$model->imageS;
					}

					$modelProduct=$this->loadModel(Yii::app()->user->getState("products_id"));

					$MoProducts=new MoProducts;
					$MoProducts->update($modelProduct->products_id,$MoProducts->buildArr($modelProduct));

				}

			}
		}

		echo json_encode($data);
	}


	public function actionProductinformations()
	{
		if(empty(Yii::app()->user->getState("products_id")))
		{
			$this->redirect(array("newproduct"));
		}

		/*
		if(empty(Yii::app()->user->getState("salestype")))
		{
			$this->redirect(array("salestype"));
		}
		*/

		$criteria=new CDbCriteria;
		$criteria->condition = "products_id=:products_id";
		$criteria->params = array (	
			':products_id' => Yii::app()->user->getState("products_id"),
		);

		$modelProductimages=Productimages::model()->findAll($criteria);

		$arr2images=array();
		$arr1images=array();

		for($i=1;$i<=8;$i++)
		{
			$arr2images[$i]=false;
		}


		foreach($modelProductimages as $key=>$value)
		{
			if($value->imagetype>0)
			{
				$arr2images[$value->imagetype]=array(
					"imageS"=>Yii::app()->params["cdn"].$value->imageS,
					"productimages_id"=>$value->productimages_id,
				);
			}else{
				$arr1images[$value->imagetype]=array(
					"imageL"=>Yii::app()->params["cdn"].$value->imageL,
					"productimages_id"=>$value->productimages_id,
				);
			}
		}

		$modelProduct=$this->loadModel(Yii::app()->user->getState("products_id"));

		
		$this->render("productinformations",array(
			"arr2images"=>$arr2images,
			"arr1images"=>$arr1images,
			'modelProduct'=>$modelProduct,
		));

	}

	public function actionSalestypebuild()
	{
		/*
		if(empty(Yii::app()->user->getState("salestype")))
		{
			$this->redirect(array("salestype"));
		}else{
			$this->redirect(array("productinformations"));
		}
		*/
		$this->redirect(array("productinformations"));
	}

	/*

	public function actionSalestypeset()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$dt=json_decode(urldecode($_POST["data"]));

			$model=$this->loadModel(Yii::app()->user->getState("products_id"));

			if(count($model)>0)
			{

				$model->salestype=$dt->salestype;
				$model->update();


				$MoProducts=new MoProducts;
				$MoProducts->update($model->products_id,$MoProducts->buildArr($model));

				Yii::app()->user->setState("salestype",$dt->salestype);

				$data["sonuc"]=1;
	
			}else{
				$data["sonuc"]=2;
			}
			
			echo json_encode($data);
		}
	}


	public function actionSalestype()
	{

		if(empty(Yii::app()->user->getState("products_id")))
		{
			$this->redirect(array("newproduct"));
		}else{

			$model=$this->loadModel(Yii::app()->user->getState("products_id"));
			Yii::app()->user->setState("salestype",$model->salestype);
			$this->render("salestype");
		}
	}
	*/

	public function actionCreateproduct()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$dt=json_decode(urldecode($_POST["data"]));

			if(empty(Yii::app()->user->getState("products_id")))
			{
				$model=new Products;
				$model->suppliers_id=Yii::app()->user->getState("supplier_id");
				$model->dateadd=date("Y-m-d H:i:s");
				$model->updatedateadd=date("Y-m-d H:i:s");
				$model->deleted=0;
				$model->admindeleted=0;
				$model->status=0;
				$model->viewed=0;
				$model->totalpoint=0;
				$model->uservotecount=0;
				$model->salestype=1;
				$model->viewok=0;
			}else{
				$model=$this->loadModel(Yii::app()->user->getState("products_id"));

			}
			
			$model->productgroup_id=$dt->productgroups_id;

			if(empty(Yii::app()->user->getState("products_id")))
			{
				if($model->save())
				{
					$code=$model->products_id+self::codeplust;
					$model->code=$code;
					$model->update();
					Yii::app()->user->setState("products_id",$model->products_id);

					$MoProducts=new MoProducts;
					$MoProducts->insert($MoProducts->buildArr($model));


					$data["sonuc"]=1;
				}else{
					$data["sonuc"]=0;
				}
			}else{
				if($model->update())
				{
		
					$data["sonuc"]=1;
				}else{
					$data["sonuc"]=0;
				}
			}


			echo json_encode($data);
		}

	}


	public function actionGetproductgroupstep()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$dt=json_decode(urldecode($_POST["data"]));

			$criteria = new CDbCriteria;

			if(empty($dt->id))
			{
				$criteria->condition = "sub_id=0 && status=1";
			}else{
				$criteria->condition = "sub_id=:id && status=1";
				$criteria->params = array (	
					':id'=>$dt->id
				);
			}

			$model=Productgroup::model()->findAll($criteria);

			$arr=array();

			foreach($model as $key=>$value)
			{
				$arr[]=array(
					"id"=>$value->productgroup_id,
					"name"=>$value->name,
				);
			}

			$data["sonuc"]=1;
			$data["list"]=$arr;

			echo json_encode($data);
		}
	}


	public function actionSearchgroups()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$arr =array();

			if (isset($_GET['term'])) {
				$MoProductgroups=new MoProductgroups;
				$get=$MoProductgroups->search($_GET['term']);
				
				foreach($get as $key=>$value)
				{

					$arr[]=array(
						"key"=>$value["productgroup_id"],
						"value"=>$value["name"],
					);
				}
				
			}

			echo CJSON::encode($arr);
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->user->setState("products_id",null);
		Yii::app()->user->getState("salestype",null);
		
		$this->redirect(array('newproduct'));
	}


	public function actionNewproduct()
	{
		$productgroup_idarr=array();

		if(!empty(Yii::app()->user->getState("products_id")))
		{
			$model=$this->loadModel(Yii::app()->user->getState("products_id"));

			Yii::app()->user->setState("salestype",$model->salestype);
			
			if(count($model)>0)
			{
				$modelProductgroup=Productgroup::model()->findByPk($model->productgroup_id);
				
				if(count($modelProductgroup)>0)
				{

					$productgroup_idarr[]=array(
						"id"=>$model->productgroup_id,
						"name"=>$modelProductgroup->name
					);
				}
			}
		}

		Yii::app()->user->setState("salestype",1);

		$this->render("newproduct",array(
			"productgroup_idarr"=>$productgroup_idarr,
		));
	}
	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModelCode($id);
		$model->status=2;
		$model->deleted=1;
		$model->update();

		$MoProducts=new MoProducts;
		$MoProducts->update($model->products_id,$MoProducts->buildArr($model));


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelCode($id)
	{
		$model=Products::model()->find("code=:code",array(":code"=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	private function productviewok($model)
	{
		if($model->status==1 && $model->deleted==0 && $model->admindeleted==0)
		{
			return 1;
		}else{
			return 0;
		}
	}


	public function actionRe()
	{
		$MoProducts=new MoProducts;
		$MoProducts->re();
	}

	const codeplust=623904;
}
