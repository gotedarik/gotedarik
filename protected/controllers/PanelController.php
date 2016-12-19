<?php
class PanelController extends Controller
{

    public $layout = "adminLayout/admin";

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

		$adminid=Yii::app()->user->getState("admin_id");

		return array(
			array('allow',
				'actions'=>array('index'),
				'expression' => array('AllowExpression','allowOnlyAdmin')
				
			),

			array('allow',
				'actions'=>array('login'),
				'users'=>array('*'),
			),

			array('deny', // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {$this->redirect(array ('panel/login'));},
			),
		);
	}



	public function actionIndex()
	{
			$this->render('index');
	}


	
	public function actionLogin()
	{
		if(!empty(Yii::app()->user->getState("admin_id"))){
			$this->redirect(array("panel/index"));
		}

		$this->layout = "adminLayout/login";

		$model=new LoginFormAdmin;


		// collect user input data
		if(isset($_POST['LoginFormAdmin']))
		{
			$model->attributes=$_POST['LoginFormAdmin'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array("panel/index"));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


	

}