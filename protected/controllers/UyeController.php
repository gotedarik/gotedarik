<?php
class UyeController extends Controller
{

    public $layout = "frontLayout/frontlayout";



	public function actions()
	{

        return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}



    public function actionIletisim($id){
        $ids = explode("-",$id);
        $id = $ids[0];

        $modelUser = $this->loadModelCode($id);

        $modelUsercompany = Userscompany::model()->find("users_id = :sid",array(
            ":sid" => $modelUser->users_id,
        ));

        $this->render("iletisim",array(
            'modelcompany' => $modelUsercompany,
            'modeluser' => $modelUser));
    }



    public function loadModelCode($id)
    {
        $model=Users::model()->findByPk($id);

        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
	/**
	 * Logs out the current user and redirect to homepage.
	 */


	
	
}