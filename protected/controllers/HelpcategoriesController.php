<?php

class HelpcategoriesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = "adminLayout/admin";

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
		$adminid=Yii::app()->user->getState("admin_id");

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','update','admin','delete'),
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
		$model=new HelpCategories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HelpCategories']))
		{
			$model->attributes=$_POST['HelpCategories'];
			$model=Func::allXssClearArr($model);

			if($model->save())
				$this->redirect(array('view','id'=>$model->category_id));
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

		if(isset($_POST['HelpCategories']))
		{
			$model->attributes=$_POST['HelpCategories'];
			$model=Func::allXssClearArr($model);
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->category_id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('HelpCategories');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HelpCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HelpCategories']))
			$model->attributes=$_GET['HelpCategories'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HelpCategories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HelpCategories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HelpCategories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='help-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getProductgroups(){
		$array=$this->groupTree();
		$array2=array(0=>'En Üst Kategori');
		
		foreach($array as $key=>$value){
			$value=(object)$value;
			
			$array2[$value->category_id]="...".$value->title;
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
			$array2[$value->category_id]=str_repeat('.....', $line).$value->title;
			unset($array[$key]);
			if(isset($value->sub_cats))
				$array2=$this->sub_cats($value->sub_cats,$array2,$line);
			$line=$line2;
		}
		
		return $array2;
	}



	private function groupTree(){
		$modelHelpCategories=HelpCategories::model()->findAll(array(
			 'order'=>'title asc',
		 ));
		
		$array=array();
		foreach ($modelHelpCategories as $key => $value)
		{
				$value=(object)$value;
				
				if($value->sub_id==0){
					$array[$value->category_id]["category_id"] = $value->category_id;
					$array[$value->category_id]["title"] = $value->title;
					$array[$value->category_id]["sub_id"] = $value->sub_id;
				
		 
					unset($modelHelpCategories[$key]);
					
					
					$array[$value->category_id]=$this->group_Find_Sub_Cats2($modelHelpCategories, $array[$value->category_id]);
				}
	 
		}
		
		return  $array;
	}



	private function group_Find_Sub_Cats2(&$modelHelpCategories, &$array)
	{ 
		
		foreach ($modelHelpCategories as $key => $value)
		{
			$value=(object)$value;
			
			if ($value->sub_id == $array['category_id'])
			{
				
				$array["sub_cats"][$value->category_id] = array(
					"category_id"=>$value->category_id,
					"title"  =>$value->title,
					"sub_id" =>$value->sub_id
				);
				
				unset($modelHelpCategories[$key]);
				
				$this->group_Find_Sub_Cats2($modelHelpCategories, $array["sub_cats"][$value->category_id]);
			}
		}
		
		return $array;
	}

}
