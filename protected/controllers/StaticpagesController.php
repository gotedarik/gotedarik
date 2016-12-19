<?php

class StaticpagesController extends Controller
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

		if(isset($_POST['Staticpages']))
		{
			$model->attributes=$_POST['Staticpages'];
            $model->content = Func::removeTags($model->content);
			if($model->save())
				$this->redirect(array('view','id'=>$model->staticpage_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Staticpages');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Staticpages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Staticpages']))
			$model->attributes=$_GET['Staticpages'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Staticpages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Staticpages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Staticpages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='staticpages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
