<?php
class MemberController extends Controller
{

    public $layout = "frontLayout/frontlayout";


	/**
	 * Declares class-based actions.
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	


	public function accessRules()
	{

		$userid=Yii::app()->user->getState("user_id");
		$supplierid=Yii::app()->user->getState("supplier_id");

		return array(
			array('allow',
				'actions'=>array('uaccount','updateuser','sale','address','newaddress','editaddress','deleteaddress'),
				 'expression' => array('AllowExpression','allowOnlyUser')
				
			),

			array('allow',
				'actions'=>array('saccount','saccount','updatesupplier','suppliercompanydocuments','suppliercompanydocumentadd','suppliercompanydocumentdelete'),
				 'expression' => array('AllowExpression','allowOnlySupplier')
				
			),

			array('allow',
				'actions'=>array('changepassword','changepasswordcontrol','companylogo','companylogoadd','companylogodelete'),
				'users'=>array('@'),
				'expression' =>  function($supplierid,$userid) {
					if(!empty($supplierid) || !empty($userid))
						return true;
				},
				
			),

			

			array('allow',
				'actions'=>array('userregister',"supplierregister"),
				'users'=>array('*'),
				
			),

			array('deny', // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {$this->redirect(array ('site/giris'));},
			),
		);
	}

	public function actionUaccount()
	{
		$this->render("uaccount");
	}

	public function actionSaccount()
	{
		$this->render("saccount");

	}

	public function actionSuppliercompanydocuments()
	{

		$iscompany=false;

		$model=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));

		$modelSuppliercompanydocuments=array();

		if(count($model)>0)
		{
			$iscompany=true;

			$modelSuppliercompanydocuments=Suppliercompanydocuments::model()->findAll("supplierscompany_id=:supplierscompany_id",array(":supplierscompany_id"=>$model->supplierscompany_id));
		}

		$this->render("suppliercompanydocuments",array(
			"modelSuppliercompanydocuments"=>$modelSuppliercompanydocuments,
			'iscompany'=>$iscompany
		));
	}

	public function actionSuppliercompanydocumentdelete()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$data["sonuc"]=0;

			$dt=json_decode(urldecode($_POST["data"]));


			$model=Suppliercompanydocuments::model()->findByPk($dt->id);

			if(count($model)>0)
			{

				$imgs[]=$model->document;
				$imgs[]=$model->documentmini;
				AmazonFunc::delete($imgs);

				if($model->delete())
				{
					$data["sonuc"]=1;
				}

			}


			echo json_encode($data);
		}
	}

	public function actionSuppliercompanydocumentadd()
	{
		$data["sonuc"]=0;
		$func=new Func;
		
		if(Yii::app()->request->isAjaxRequest && isset($_FILES['upl']['tmp_name']) && $func->fileTypeControl2($_FILES['upl']["type"]))
		{

			$model=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));

			if(count($model)>0)
			{

				$modelSuppliercompanydocuments=new Suppliercompanydocuments;
				$modelSuppliercompanydocuments->supplierscompany_id=$model->supplierscompany_id;

				$image=$_FILES['upl']['tmp_name'];
				imagejpeg(imagecreatefromstring(file_get_contents($image)),$image);
				$resize = new ResizeImage($image);
				$resize->resizeTo(700, 700, 'maxWidth');
				$resize->saveImage($image);

				$h1=$func->getHashCode(4,8)."_".time();
				$imagename1="suppliercompanydocuments/".$model->supplierscompany_id."_".$h1."_1.jpg";
				$imagename2="suppliercompanydocuments/".$model->supplierscompany_id."_".$h1."_2.jpg";

				$s31=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename1);

				$resize = new ResizeImage($image);
				$resize->resizeTo(230, 230, 'maxWidth');
				$resize->saveImage($image);

				$s32=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename2);

				$modelSuppliercompanydocuments->document=$imagename1;
				$modelSuppliercompanydocuments->documentmini=$imagename2;
				$modelSuppliercompanydocuments->documents3url=$s31["url"];
				$modelSuppliercompanydocuments->documentminis3url=$s32["url"];

				if($modelSuppliercompanydocuments->save())
				{
					$data["sonuc"]=1;
					$data["image1"]=Yii::app()->params["cdn"].$imagename1;
					$data["image2"]=Yii::app()->params["cdn"].$imagename2;
					$data["id"]=$modelSuppliercompanydocuments->suppliercompanydocuments_id;
				}

			}
			

		}


		echo json_encode($data);

	}

	

	public function actionCompanylogo(){
		
		if(!empty(Yii::app()->user->getState("user_id")))
		{
			$model=Userscompany::model()->find("users_id=:users_id",array(":users_id"=>Yii::app()->user->getState("user_id")));

		}else{
			$model=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));
		}
		
		$islogo=false;
		
		if(isset($model->logo) && !empty($model->logo))
		{
			$model->logo=Yii::app()->params["cdn"].$model->logo;
			$islogo=true;
		}

		$this->render("companylogo",array(
			"model"=>$model,
			"islogo"=>$islogo
		));
	}

	public function actionCompanylogoadd(){
		
		if(!empty(Yii::app()->user->getState("user_id")))
		{
			$data=$this->logoAdd("user");

		}else{
			$data=$this->logoAdd("supplier");
		}

		echo json_encode($data);
	}

	public function actionCompanylogodelete()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$data["sonuc"]=0;

			if(!empty(Yii::app()->user->getState("user_id")))
			{
				$model=Userscompany::model()->find("users_id=:users_id",array(":users_id"=>Yii::app()->user->getState("user_id")));

			}else{
				$model=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));
			}

			if(isset($model->logo))
			{

				$imgs[]=$model->logo;
				AmazonFunc::delete($imgs);

				$model->logo="";
				$model->logos3url="";
				if($model->update())
				{
					$data["sonuc"]=1;
				}
			}

			echo json_encode($data);

		}
		
	}

	private function logoAdd($param)
	{
		$data["sonuc"]=0;
		$func=new Func;
		
		if(Yii::app()->request->isAjaxRequest && isset($_FILES['upl']['tmp_name']) && $func->fileTypeControl2($_FILES['upl']["type"]))
		{

			if($param=="user")
				$model=Userscompany::model()->find("users_id=:users_id",array(":users_id"=>Yii::app()->user->getState("user_id")));
			else
				$model=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>Yii::app()->user->getState("supplier_id")));

			if(count($model)>0)
			{
				$image=$_FILES['upl']['tmp_name'];
				imagejpeg(imagecreatefromstring(file_get_contents($image)),$image);
				$resize = new ResizeImage($image);
				$resize->resizeTo(180, 180, 'maxWidth');
				$resize->saveImage($image);

				$imagename=($param=="user"?"usercompanylogo/":"supplierscompanylogo/").($param=="user"?$model->userscompany_id:$model->supplierscompany_id)."_".$func->getHashCode(3,6)."_".time().".jpg";

				$imgs[]=$model->logo;

				AmazonFunc::delete($imgs);
				$s3=AmazonFunc::upload($_FILES["upl"]["tmp_name"],$imagename);

				$model->logo=$imagename;
				$model->logos3url=$s3["url"];

				if($model->update())
				{
					$data["sonuc"]=1;
					$data["image"]=Yii::app()->params["cdn"].$imagename;
				}
			}
			
		}

		return  $data;
	}

	public function actionSale(){
		$this->render("sale");
	}

	public function actionAddress(){
		$criteria = new CDbCriteria;
		$criteria->condition = "users_id = :id";
		$criteria->params = array(":id" => Yii::app()->user->getState("user_id"));
		$criteria->order = "address_id DESC";

		$itemcount = UserAdresses::model()->count($criteria);

		$pages = new CPagination($itemcount);
		$pages->setPageSize(Yii::app()->params["listPerPage"]);
		$pages->applyLimit($criteria);

		$this->render('address',array(
			'model' =>  UserAdresses::model()->findAll($criteria),
			'item_count' => $itemcount,
			'page_size' => Yii::app()->params["listPerPage"],
			'items_count' => $itemcount,
			'pages' => $pages
		));
	}

	public function actionEditaddress($id){
		$userid = Yii::app()->user->getState("user_id");
		$model = UserAdresses::model()->findByPk($id);

		if(isset($_POST["UserAdresses"])){
			$model->attributes = $_POST["UserAdresses"];
			$model=Func::allXssClearArr($model);
			
			$model->users_id = $userid;
			if($model->current_address == 1){
				UserAdresses::model()->updateAll(array("current_address"=>0),"users_id = $userid");
				$model->current_address = 1;
			}

			if($model->save()){
				$update = 1;
				$this->redirect(array('member/address','update' =>$update));
			}else{
				$update = 2;
				$this->redirect(array('member/address','update' =>$update));
			}

		}
		$this->render('editaddress',array('model' => $model));
	}

	public function actionNewaddress(){
		$userid = Yii::app()->user->getState("user_id");
		$model = new UserAdresses;

		if(isset($_POST["UserAdresses"])){
			$model->attributes = $_POST["UserAdresses"];
			$model=Func::allXssClearArr($model);

			$model->users_id = $userid;
			if($model->current_address == 1){
				UserAdresses::model()->updateAll(array("current_address"=>0),"users_id = $userid");
				$model->current_address = 1;
			}

			if($model->save()){
				$update = 1;
				$this->redirect(array('member/address','saved' =>$update));
			}else{
				$update = 2;
				$this->redirect(array('member/address','saved' =>$update));
			}

		}


		$this->render('newaddress',array('model' => $model));
	}

	public function actionDeleteaddress($id)
	{	
		$model = UserAdresses::model()->findByPk($id);

		if($model->delete()){
			$update = 1;
			$this->redirect(array('member/address','deleted' =>$update));
		}else{
			$update = 2;
			$this->redirect(array('member/address','deleted' =>$update));
		}
		
	}
	
	public function actionUpdateuser(){
		$isupdate=0;

		$model=Users::model()->findByPk(Yii::app()->user->getState("user_id"));

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model=Func::allXssClearArr($model);

			if($model->save())
			{
				$isupdate=1;
			}else{
				$isupdate=2;
			}
		}

		$this->render("updateuser",array(
			'model'=>$model,
			'isupdate'=>$isupdate
		));
	}

	public function actionUpdatesupplier(){
		$isupdate=0;

		$model=Suppliers::model()->findByPk(Yii::app()->user->getState("supplier_id"));

		if(isset($_POST['Suppliers']))
		{
			$model->attributes=$_POST['Suppliers'];
			$model=Func::allXssClearArr($model);

			if($model->save())
			{
				$isupdate=1;
			}else{
				$isupdate=2;
			}
		}

		$this->render("updatesupplier",array(
			'model'=>$model,
			'isupdate'=>$isupdate
		));
	}

	public function actionChangepassword(){

		$this->render("changepassword");
	}

	public function actionChangepasswordcontrol(){

		$data["sonuc"]=0;

		if(Yii::app()->request->isAjaxRequest && isset($_POST["data"]))
		{

			$dt=json_decode(urldecode($_POST["data"]));


			if(!Nonpassword::control($dt->newpassword))
			{
				$data["sonuc"]=3;
			}elseif(!empty(Yii::app()->user->getState("user_id")))
			{
				$model=Users::model()->findByPk(Yii::app()->user->getState("user_id"));

				if($model->password==Hash::hashCreate(trim($dt->oldpassword)))
				{
					
					$model->password=Hash::hashCreate(trim($dt->newpassword));

					if($model->update())
					{
						$data["sonuc"]=1;
					}
				}else{
					$data["sonuc"]=2;
				}


				

			}elseif(!empty(Yii::app()->user->getState("supplier_id"))){

				$model= Suppliers::model()->findByPk(Yii::app()->user->getState("supplier_id"));

				if($model->password==Hash::hashCreate(trim($dt->oldpassword)))
				{
					
					$model->password=Hash::hashCreate(trim($dt->newpassword));

					if($model->update())
					{
						$data["sonuc"]=1;
					}
				}else{
					$data["sonuc"]=2;
				}
			}

		}


		echo json_encode($data);
	}

	public function actionUserregister()
	{
		
		$data["sonuc"]=0;

		if(Yii::app()->request->isAjaxRequest && isset($_POST["data"]))
		{
			
			$dt=json_decode(urldecode($_POST["data"]));

			$model=new Users;
			$model->name=trim($dt->name);
			$model->email=trim($dt->email);
			$model->password=Hash::hashCreate(trim($dt->password));
			$model->password2=Hash::hashCreate(trim($dt->password));
			$model->deleted=0;
			$model->dateadd=date("Y-m-d H:i:s");

			if(!Nonpassword::control($dt->password))
			{
				$data["sonuc"]=3;
			}else{
				$userModel = Users::model()->find("email = :email",array(
					":email" => trim($dt->email)
				));

				if(count($userModel) > 0)
				{
					$data["sonuc"]=2;
				}else if($model->save())
				{
					$arr=array(
						"password"=>trim($dt->password),
						"username"=>trim($dt->email),
						"rememberme"=>0
					);


					UserIdentity::login((object)$arr);
					$data["sonuc"]=1;


					/* email gönderilecek */
				}
			}
			
		}

		CookieBasket::deleteAll();


		echo json_encode($data);
	}


	public function actionSupplierregister()
	{
		
		$data["sonuc"]=0;

		if(Yii::app()->request->isAjaxRequest && isset($_POST["data"]))
		{
			
			$dt=json_decode(urldecode($_POST["data"]));

			$model=new Suppliers;
			$model->name=trim($dt->name);
			$model->email=trim($dt->email);
			$model->password=Hash::hashCreate(trim($dt->password));
			$model->password2=Hash::hashCreate(trim($dt->password));
			$model->deleted=0;
			$model->dateadd=date("Y-m-d H:i:s");

			if(!Nonpassword::control($dt->password))
			{
				$data["sonuc"]=3;
			}else{
				$userModel = Suppliers::model()->find("email = :email",array(
					":email" => trim($dt->email)
				));

				if(count($userModel) > 0)
				{
					$data["sonuc"]=2;
				}else if($model->save())
				{
					$arr=array(
						"password"=>trim($dt->password),
						"username"=>trim($dt->email),
						"rememberme"=>0
					);


					SupplierIdentity::login((object)$arr);

                    $model->code = $model->suppliers_id + self::codeplust;
                    $model->update();
                    
					$data["sonuc"]=1;

					/* email gönderilecek */
				}
			}
			
		}

		echo json_encode($data);
	}

    const codeplust=125214;


}