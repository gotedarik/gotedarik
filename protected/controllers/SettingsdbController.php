<?php

class SettingsdbController extends Controller
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settingsdb']))
		{
			$model->attributes=$_POST['Settingsdb'];
            $model->copyright = Func::removeTags($model->copyright);
			if($model->save())
				$this->redirect(array('view','id'=>$model->settings_id));
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
		$dataProvider=new CActiveDataProvider('Settingsdb');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Settingsdb('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Settingsdb']))
			$model->attributes=$_GET['Settingsdb'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Settingsdb the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Settingsdb::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Settingsdb $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='settingsdb-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
