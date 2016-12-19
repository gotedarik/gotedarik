<?php

class BuildfakeController extends Controller
{
	/**
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
	public function accessRules()
	{
		$adminid = Yii::app()->user->getState("admin_id");
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','view','update','admin','delete','urunekle','urladmin','urladminupdate','urldelete','botrun','botrunexec'),
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
		$model=new Suppliers;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{

			$model->attributes=$_POST['Suppliers'];
			$model=Func::allXssClearArr($model);

			if(!empty($model->password ))
			{
				$model->password = Hash::hashCreate($model->password);
			}

			if(!empty($model->password2)){
				$model->password2=Hash::hashCreate($model->password2);
			}

			$model->dateadd = date('Y-m-d H:i:s');
            $model->fake = 1;
			if($model->save()){
			    $code = $model->suppliers_id + self::codeplust;
                $model->code = $code;
                $model->update();
                $this->redirect(array('view','id'=>$model->suppliers_id));
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
		$password = $model->password;
		$model->password="";

		$p1="";
		$p2="";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{

			$model->attributes=$_POST['Suppliers'];
			$model=Func::allXssClearArr($model);
			
			if(!empty($model->password)){
				$p1=$model->password;
				$model->password = md5(sha1(md5($model->password)));

				if(!empty($model->password2)){
					$p2=$model->password2;
					$model->password2 = md5(sha1(md5($model->password2)));
				}
			}else{
				$model->password = $password;
				$model->password2 = $password;
			}

			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->suppliers_id));
			}else{

				$model->password=$p1;
				$model->password2=$p2;
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
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$model->deleted=1;
		$model->update();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Suppliers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Suppliers('search');
		$model->unsetAttributes();  // clear any default values

		$model->fake=1;

		if(isset($_GET['Suppliers']))
			$model->attributes=$_GET['Suppliers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionBotrun()
    {
        $this->render("botrun");
	}

    public function actionBotrunexec()
    {
        if(Yii::app()->request->isAjaxRequest){
            $model = Fakeproducts::model()->findAll();
            foreach ($model as $key => $value){
                $modelProduct = new Products;
                $modelPimages = new Productimages;
                $arr = Func::cek($value->url);

            }
        }
    }

    public function actionUrladmin()
    {
        $model=new Fakeproducts('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Fakeproducts']))
            $model->attributes=$_GET['Fakeproducts'];

        $this->render('urladmin',array(
            'model'=>$model,
        ));
    }

    public function actionUrunekle()
    {
        $model=new Fakeproducts;

        if(isset($_POST['Fakeproducts']))
        {
            $model->attributes=$_POST['Fakeproducts'];
            $model->url = Func::xssClear($model->url);
            if($model->validate())
            {
               if($model->save())
                   $this->redirect(array('urladmin'));

            }
        }
        $this->render('urunekle',array('model'=>$model));
    }

    public function actionUrladminupdate($id)
    {
        $model=Fakeproducts::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Fakeproducts']))
        {
            $model->attributes=$_POST['Fakeproducts'];
            if($model->save())
                $this->redirect(array('urladmin'));
        }

        $this->render('urladminupdate',array(
            'model'=>$model,
        ));
    }

    public function actionUrldelete($id)
    {
        $model = Fakeproducts::model()->findByPk($id);
        $model->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public static function getFakesuppliers()
    {
        $model = Suppliers::model()->findAll("fake = :f",array(":f" => 1));

        $array = array();
        $array[""] = "Tedarikçi seçiniz";
        foreach ($model as $key => $value){
            $array[$value->suppliers_id] =  $value->name;
        }
        return $array;
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suppliers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suppliers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suppliers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    const codeplust=125214;
	
}
