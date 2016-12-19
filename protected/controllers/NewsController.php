	<?php

class NewsController extends Controller
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
			array('allow',
				'actions' => array('detail','list'),
				'users' => array('*'),
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
		$model=new News("create");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes = $_POST["News"];
            

            $func=new Func;
            $h1="news/".$func->getHashCode(4,8)."_".time()."_M.jpg";
            $h2="news/".$func->getHashCode(4,8)."_".time()."_S.jpg";

            $model->imgM=CUploadedFile::getInstance($model,'imgM');
            $image=CUploadedFile::getInstance($model,'imgM');
            $model->imgS=$h2;
			$model->admins_id =Yii::app()->user->getState("admin_id");

			$model->title=Func::xssClear($model->title);
			$model->content = Func::removeTags($model->content);
			$model->dateadd = date("Y-m-d H:i:s");
			$model->read = 0;

			if($model->save())
			{

				$tmp=tempnam(Yii::app()->basePath.'/tmp',"TMP0.jpeg");
				$model->imgM->saveAs($tmp);
				$model->imgM=$h1;
				imagejpeg(imagecreatefromstring(file_get_contents($tmp)),$tmp);
				$resize = new ResizeImage($tmp);
				$resize->resizeTo(460, 460, 'maxWidth');
				$resize->saveImage($tmp);

				$s30=AmazonFunc::upload($tmp,$model->imgM);

				$resize = new ResizeImage($tmp);
				$resize->resizeTo(220, 220, 'maxWidth');
				$resize->saveImage($tmp);

				$s31=AmazonFunc::upload($tmp,$model->imgS);

				if(file_exists($tmp))
					unlink($tmp);

				$model->imgM_s3url=$s30["url"];
				$model->imgS_s3url=$s31["url"];

				$model->update();
				$this->redirect(array('view','id'=>$model->news_id));
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

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];

			$model->content =Func::removeTags($model->content);
			$model->title=Func::xssClear($model->title);
			if($model->save())
			{
				if(!empty(CUploadedFile::getInstance($model,'imgM')))
				{
					$func=new Func;
		            $h1="news/".$func->getHashCode(4,8)."_".time()."_M.jpg";
		            $h2="news/".$func->getHashCode(4,8)."_".time()."_S.jpg";

		            $image=CUploadedFile::getInstance($model,'imgM');
		            
					$imgs[]=$model->imgM;
					$imgs[]=$model->imgS;
					AmazonFunc::delete($imgs);

					$tmp=tempnam(Yii::app()->basePath.'/tmp',"TMP0");

	            	$model->imgM=CUploadedFile::getInstance($model,'imgM');
					$model->imgM->saveAs($tmp);
					$model->imgM=$h1;
					$model->imgS=$h2;
					imagejpeg(imagecreatefromstring(file_get_contents($tmp)),$tmp);
					$resize = new ResizeImage($tmp);
					$resize->resizeTo(360, 360, 'maxWidth');
					$resize->saveImage($tmp);

					$s30=AmazonFunc::upload($tmp,$model->imgM);

					$resize = new ResizeImage($tmp);
					$resize->resizeTo(160, 160, 'maxWidth');
					$resize->saveImage($tmp);

					$s31=AmazonFunc::upload($tmp,$model->imgS);

					if(file_exists($tmp))
						unlink($tmp);

					$model->imgM_s3url=$s30["url"];
					$model->imgS_s3url=$s31["url"];

					$model->update();
				}
				
				$this->redirect(array('view','id'=>$model->news_id));
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
		$model->status=0;
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
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	

	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
