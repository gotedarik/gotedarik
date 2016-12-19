<?php
class SiteController extends Controller
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	    $criteria = new CDbCriteria;
        $criteria->order = "testimonials_id DESC";
        $criteria->limit = 30;

	    $modelTestimonials = Customertestimonials::model()->findAll($criteria);

		$this->render("index",array(
		    'modelTestimonials' => $modelTestimonials
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionGiris()
	{
		Yii::app()->params["site_title"]="Giriş ve Üyelik - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

		$this->render("login");
	}

    public function actionTedarikcigirisi()
    {
        Yii::app()->params["site_title"]="Giriş ve Üyelik - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

        $this->render("login2");
    }

    public function actionUyeol()
    {
        Yii::app()->params["site_title"]="Giriş ve Üyelik - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";
        $this->render("createacc");
    }

	public function actionForgotPassword(){
		Yii::app()->params["site_title"]="Şifremi unuttum - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

		$this->render("forgotpassword");
	}

	public function actionUserlogin()
	{

		$data["sonuc"]=0;

		if(Yii::app()->request->isAjaxRequest  && isset($_POST["data"]))
		{

			Func::logout();
			$dt=json_decode(urldecode($_POST["data"]));


			if(UserIdentity::login($dt))
			{
				$data["sonuc"]=1;
			}
		}

		echo json_encode($data);
	}

	public function actionSupplierlogin()
	{
		
		$data["sonuc"]=0;

		if(Yii::app()->request->isAjaxRequest  && isset($_POST["data"]))
		{
			Func::logout();
			$dt=json_decode(urldecode($_POST["data"]));

			
		
			if(SupplierIdentity::login($dt))
			{
				$data["sonuc"]=1;
			}
		}

		echo json_encode($data);
	}
	
	public function actionIletisim()
	{
		Yii::app()->params["site_title"]="İletişim - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

	    $model = Settingsdb::model()->findAll();
		$this->render("iletisim",
            array('model'=> $model));
	}

    public function actionHakkimizda()
    {
    	Yii::app()->params["site_title"]="Hakkımızda - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

        $model = Staticpages::model()->findByPk(2);
        $this->render("hakkimizda",array(
            "model" => $model
        ));
    }

    public function actionGizlilikIlkeleri	()
    {
    	Yii::app()->params["site_title"]="Gizlilik ilkesi - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

        $model = Staticpages::model()->findByPk(1);
        $this->render("gizlilik-ilkeleri",array(
            "model" => $model
        ));
    }

    public function actionSartlarkosullar()
    {
    	Yii::app()->params["site_title"]="Şartlar ve Koşullar- ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

        $model = Staticpages::model()->findByPk(3);
        $this->render("sartlar-kosullar",array(
            "model" => $model
        ));
    }

    public function actionUrunler()
    {
      $this->render("urunler");
    }

    public function actionTedarikciler()
    {
        $this->render("tedarikciler");

    }

    public function actionTeslimatbilgileri()
    {
        $model = Staticpages::model()->findByPk(4);
        $this->render("teslimat-bilgileri",array(
            "model" => $model
        ));
    }



    /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}



	
	
}