<?php

class ProductgroupController extends Controller
{



	/*
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	*/

	public $layout='//layouts/adminLayout/admin';

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
	public function accessRules(){
		$adminid = Yii::app()->user->getState("admin_id");

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','update','admin','deletegroup','re'),
				'expression' => array('AllowExpression','allowOnlyAdmin')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
				'deniedCallback' => function() {$this->redirect(array ('panel/login'));},
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionCreate()
	{
		$model=new Productgroup;
		$model->status=1;

		if(isset($_POST['Productgroup']))
		{
			$model->attributes=$_POST['Productgroup'];

			if($model->sub_id!=0){
				$model=Func::allXssClearArr($model);

				if($model->save()){
					
					$this->producgropssublist();
					$this->redirect(array('admin'));
				}

			}elseif(!CUploadedFile::getInstance($model,'image') && $model->sub_id==0)
			{
				$model->validate();
				$model->addError('image','Üst Kategori için, Anasayfada "Bu ayın En Çok İşlem Gören Kategorileri" için bir resim belirleyiniz..');

			}else{
				$func=new Func;
	            $h1="productgroup/".$func->getHashCode(4,8)."_".time()."_0.jpg";

	            $image=CUploadedFile::getInstance($model,'image');
	            $model->image=$h1;

				$model->name=Func::xssClear($model->name);

				if($model->save()){
					
					
					if(CUploadedFile::getInstance($model,'image'))
					{

	      			    $model->image=CUploadedFile::getInstance($model,'image');

						$tmp=tempnam(Yii::app()->basePath.'/tmp',"TMP0.jpeg");
						$model->image->saveAs($tmp);
						$model->image=$h1;
						imagejpeg(imagecreatefromstring(file_get_contents($tmp)),$tmp);
						$resize = new ResizeImage($tmp);
						$resize->resizeTo(240, 240, 'maxWidth');
						$resize->saveImage($tmp);

						$s30=AmazonFunc::upload($tmp,$model->image);

						if(file_exists($tmp))
							unlink($tmp);

						$model->image_s3url=$s30["url"];
						$model->update();
					}

					$MoProductgroups=new MoProductgroups;
					$MoProductgroups->insert($MoProductgroups->buildArr($model));

					$this->producgropssublist();
					$this->redirect(array('admin'));
				}
			}
            
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}



	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productgroup']))
		{
			$model->attributes=$_POST['Productgroup'];

			if($model->sub_id!=0 || !empty($model->image))
			{	
				$model=Func::allXssClearArr($model);

				if($model->save()){
					
					$this->producgropssublist();
					$this->redirect(array('admin'));
				}

			}elseif(!CUploadedFile::getInstance($model,'image') && $model->sub_id==0)
			{
				$model->validate();
				$model->addError('image','Üst Kategori için, Anasayfada "Bu ayın En Çok İşlem Gören Kategorileri" için bir resim belirleyiniz..');

			}else{
				$func=new Func;
	            $h1="productgroup/".$func->getHashCode(4,8)."_".time()."_0.jpg";

	            $image=CUploadedFile::getInstance($model,'image');
	            $model->image=$h1;

				$model->name=Func::xssClear($model->name);

				if($model->save()){
					
					
					if(CUploadedFile::getInstance($model,'image'))
					{

	      			    $model->image=CUploadedFile::getInstance($model,'image');

						$tmp=tempnam(Yii::app()->basePath.'/tmp',"TMP0.jpeg");
						$model->image->saveAs($tmp);
						$model->image=$h1;
						imagejpeg(imagecreatefromstring(file_get_contents($tmp)),$tmp);
						$resize = new ResizeImage($tmp);
						$resize->resizeTo(240, 240, 'maxWidth');
						$resize->saveImage($tmp);

						$s30=AmazonFunc::upload($tmp,$model->image);

						if(file_exists($tmp))
							unlink($tmp);

						$model->image_s3url=$s30["url"];
						$model->update();
					}

					$MoProductgroups=new MoProductgroups;
					$MoProductgroups->update($model->productgroup_id,$MoProductgroups->buildArr($model));


					$this->producgropssublist();
					$this->redirect(array('admin'));
				}
			}
            
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeletegroup($id)
	{
		$model=$this->loadModel($id);
		$_id=$model->productgroup_id;
		if($model->delete())
			$this->deletegroup($_id);
		
		$this->redirect(array('productgroup/admin'));
	}

	public function deletegroup($id){
		$model=Productgroup::model()->find("sub_id=:sub_id",array(":sub_id"=>$id));
		if(count($model)>1){
			$_id=$model->productgroup_id;
			$model->delete();
			$this->deletegroup($_id);
		}
	}





	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		 $modelProductgroups=Productgroup::model()->findAll(array(
						             'order'=>'name asc',
						        ));
		$this->render('admin',array(
			'modelProductgroups'=>$modelProductgroups
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Productgroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Productgroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Productgroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='productgroup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public static function group_Find_Sub_Cats(&$modelProductgroups, $ptID)
	{
        $i=0;
        foreach ($modelProductgroups as $key => $value)
        {
            if ($value->sub_id== $ptID)
            {
                $i++;
            }
        }
        
        if($i>0)
            echo "<ul>";
        foreach ($modelProductgroups as $key => $value)
        {
            $value=(object)$value;
            
            if ($value->sub_id== $ptID)
            {
            	self::treeaction($value);
                self::group_Find_Sub_Cats($modelProductgroups, $value->productgroup_id);
            }
        }
        
        if($i>0)
            echo "</ul>";
        
    }


	private function group_Find_Sub_Cats2(&$modelProductgroup, &$array)
	{ 
		
		foreach ($modelProductgroup as $key => $value)
		{
			$value=(object)$value;
			
			if ($value->sub_id == $array['productgroup_id'])
			{
				
				$array["sub_cats"][$value->productgroup_id] = array(
					"productgroup_id"=>$value->productgroup_id,
					"name"  =>$value->name,
					"sub_id" =>$value->sub_id
				);
				
				unset($modelProductgroup[$key]);
				
				$this->group_Find_Sub_Cats2($modelProductgroup, $array["sub_cats"][$value->productgroup_id]);
			}
		}
		
		return $array;
	}

	public static function treeaction($value)
	{
		echo "<li>";
        echo '<span class="groupSelect" id="a'.$value->productgroup_id.'">'.$value->name.' <a href="'.Yii::app()->createUrl("productgroup/update").'/'.$value->productgroup_id.'">(Düzenle)</a>&nbsp;&nbsp;<a href="'.Yii::app()->createUrl("productgroup/deletegroup").'/'.$value->productgroup_id.'">(Sil)</a></span>';
        
	}

	public function groupTree(){
		$modelProductgroup=Productgroup::model()->findAll(array(
			 'order'=>'name asc',
		 ));
		
		$array=array();
		foreach ($modelProductgroup as $key => $value)
		{
				$value=(object)$value;
				
				if($value->sub_id==0){
					$array[$value->productgroup_id]["productgroup_id"] = $value->productgroup_id;
					$array[$value->productgroup_id]["name"] = $value->name;
					$array[$value->productgroup_id]["sub_id"] = $value->sub_id;
				
		 
					unset($modelProductgroup[$key]);
					
					
					$array[$value->productgroup_id]=$this->group_Find_Sub_Cats2($modelProductgroup, $array[$value->productgroup_id]);
				}
	 
		}
		
		return  $array;
	}


	public function getProductgroups(){
		$array=$this->groupTree();
		$array2=array(0=>'En Üst Kategori');
		
		foreach($array as $key=>$value){
			$value=(object)$value;
			
			$array2[$value->productgroup_id]="...".$value->name;
			$line=1;
			unset($array[$key]);
			if(isset($value->sub_cats))
				$array2=$this->sub_cats($value->sub_cats,$array2,$line);
			
			
		}

		return $array2;
	}

	private function sub_cats(&$array,&$array2,&$line){
		$line2=$line;
		foreach($array as $key=>$value){
			$value=(object)$value;
			$line++;
			$array2[$value->productgroup_id]=str_repeat('.....', $line).$value->name;
			unset($array[$key]);
			if(isset($value->sub_cats))
				$array2=$this->sub_cats($value->sub_cats,$array2,$line);
			$line=$line2;
		}
		
		return $array2;
	}

	private static function searchSubID_Find_Sub_Cats(&$list, &$selected, &$tee)
	{
		foreach ($list as $id => $item)
	    {
	        
	        if ($item['sub_id'] == $selected['productgroup_id'])
	        {

	            $selected['sub_cats'][$item['productgroup_id']] = $item;
	 			$tee[]=$item['productgroup_id'];

	            unset($list[$id]);
	 
	            self::searchSubID_Find_Sub_Cats($list, $selected['sub_cats'][$item['productgroup_id']],$tee);
	        }
    	}
	}
	//////////////////////////////////////
	public static function searchSubID($productgroup_id)
	{
		$modelProductgroup=Productgroup::model()->findAll(array(
			"condition"=>"status=1",
			'order'=>'name asc'
		));


		$list=array();
		foreach($modelProductgroup as $key=>$value)
		{
			$list[$value->productgroup_id]=array(
				"productgroup_id"=>$value->productgroup_id,
				"sub_id"=>$value->sub_id,
			);
		}


		$tree = array();
		$tee=array();
		$tee[] = $productgroup_id;

		foreach ($list as $id => $item)
		{

			if ($productgroup_id > 0){

				$control=$productgroup_id;
			}else{

				$control=0;
			}

			if ($item['sub_id'] == $control)
			{
				$tree[$item['productgroup_id']] = $item;
				$tee[]=$item['productgroup_id'];

				unset($list[$id]);


				self::searchSubID_Find_Sub_Cats($list, $tree[$item['productgroup_id']],$tee);
			}
		}

		return $tee;
	}

	public static function producgropssublist()
	{
		$modelProductGroup = Productgroup::model()->findAll();
		Producgropssublist::model()->deleteAll();

		foreach ($modelProductGroup as $key => $value) {
			$ids = self::searchSubID($value->productgroup_id);

			$modelProducgropssublist = new Producgropssublist;
			$modelProducgropssublist->productgroup_id=$value->productgroup_id;
			$modelProducgropssublist->productgroupsub_ids=implode(",",$ids);
			$modelProducgropssublist->save();
		}
	}

	public function actionRe()
	{
		$MoProductgroups=new MoProductgroups;
		$MoProductgroups->re();
	}
	
}
