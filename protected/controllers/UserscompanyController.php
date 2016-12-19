<?php

class UserscompanyController extends Controller
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
		$userid=Yii::app()->user->getState("user_id");

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('update'),
				'expression' => array('AllowExpression','allowOnlyUser')
				
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
				'deniedCallback' => function() {$this->redirect(array ('panel/login'));},
			),
		);
	}

	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate()
	{
		$model=Userscompany::model()->find("users_id=:users_id",array(":users_id"=>Yii::app()->user->getState("user_id")));
		
		
		if(count($model)==0)
		{
			$model=new Userscompany;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Userscompany']))
		{
			$model->attributes=$_POST['Userscompany'];
			$model=Func::allXssClearArr($model);
			$model->users_id=Yii::app()->user->getState("user_id");
			$model->save();
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

}
