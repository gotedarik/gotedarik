<?php
class YardimController extends Controller
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

	
	public function actionIndex()
	{
        Yii::app()->params["site_title"]="Yardım Merkezi - ".Yii::app()->name;
        Yii::app()->params["site_description"]="GoTedarik Yardım Merkezi'ne hoşgeldiniz. Başlamak için yan taraftaki kategorilerden birinin üzerine gelip, sizin için uygun olan bir başlık seçip ilerleyin.";
        Yii::app()->params["site_keywords"]="alıcı işlemleri, satıcı işlemleri, hesap, üyelik, gittigidiyor, yardım, rapor et, kategoriler, ürün arama, kredi kartı, satıcı, kampanyalar, listeleme, vergi, fatura, turbolist, mağaza, günün fırsatı, şifre, güvenlik, sıfır risk, öneriler";

		$model = HelpAnnouncement::model()->find();
        $modelQuestions = HelpQuestions::model()->findAll("popular = :pop",array(
            ":pop" => 1));
        $modelreadyQuestions = HelpQuestions::model()->findAll("readyquestions = :read",array(
            ":read" => 1));
		$this->render("index",array(
			'announceModel' =>$model,
            'modelQuestions' => $modelQuestions,
            'modelreadyQuestions' => $modelreadyQuestions
		));
	}

    public function actionAra()
    {

        $match = Func::xssClear($_GET["text"]);

        $criteria = new CDbCriteria;
        $criteria->select = "t.question,t.question_id";
        $criteria->condition = "question LIKE :match";
        $criteria->limit = 10;
        $criteria->params = array(':match' => "%$match%");

        $model = HelpQuestions::model()->findAll($criteria);

        $result = array();

        foreach ($model as $key => $value){
            $result[] = array(
                'qid' => $value->question_id,
                'question' => $value->question,
            );
        }

        $this->render("ara",array("model" => $result));
	}

	public function actionDuyurular(){
		
        Yii::app()->params["site_title"]="Duyurular - ".Yii::app()->name;
        Yii::app()->params["site_description"]="";

		$model = HelpAnnouncement::model()->findAll();
		
		$this->render('duyurular',array(
			'allannouncements' =>$model
		));
	}

    public function actionMainsearch(){
        if(Yii::app()->request->isAjaxRequest){
            $dt=json_decode(urldecode($_POST["data"]));

            $match = Func::xssClear($dt->text);

            $criteria = new CDbCriteria;
            $criteria->select = "t.question,t.question_id";
            $criteria->condition = "question LIKE :match";
            $criteria->limit = 10;
            $criteria->params = array(':match' => "%$match%");

            $model = HelpQuestions::model()->findAll($criteria);

            $result = array();

                foreach ($model as $key => $value){
                    $result["questions"][] = array(
                        'qid' => $value->question_id,
                        'question' => $value->question,
                    );
                }
                echo json_encode($result);
        }

    }

	public function actionMusterihizmetleri($id = null)
	{

        Yii::app()->params["site_title"]="Müşteri Hizmetlerl - ".Yii::app()->name;
        Yii::app()->params["site_description"]="GoTedarik Yardım Merkezi'ne hoşgeldiniz. Başlamak için yan taraftaki kategorilerden birinin üzerine gelip, sizin için uygun olan bir başlık seçip ilerleyin.";
        Yii::app()->params["site_keywords"]="alıcı işlemleri, satıcı işlemleri, hesap, üyelik, gittigidiyor, yardım, rapor et, kategoriler, ürün arama, kredi kartı, satıcı, kampanyalar, listeleme, vergi, fatura, turbolist, mağaza, günün fırsatı, şifre, güvenlik, sıfır risk, öneriler";

	    if($id != null){

            $ids = explode("-",$id);
            $id =trim($ids[0]);

            $modelQuestion = HelpQuestions::model()->findByPk($id);
        }else{
            $modelQuestion = array();
        }
		$this->render("musteri-hizmetleri",array("modelquestion" => $modelQuestion));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */

	public function findHelpCat(){
	    $model = HelpCategories::model()->findAllByAttributes(array("sub_id" => 0));

        foreach ($model as $key => $value) {

            if($value->title == "Alıcıyım"){
                $cssclass = "fa-user";
            }else if($value->title == "Satıcıyım"){
                $cssclass = "fa-users";
            }else if($value->title == "Üyelik İşlemleri"){
                $cssclass = "fa-gears";
            }else if($value->title == "Rapor Et"){
                $cssclass = "fa-exclamation";
            }

            echo "<li>
            <a class='menuitem1' href=''><i class='fa $cssclass fa-2x'></i><br>".Func::xssClear($value->title)."</a>
            <div class='content-menu'>";
                    $this->findSubs($value->category_id);
                echo "</div>
        </li>";
        }
    }

    public function findSubs($id){
        $model = HelpCategories::model()->findAllByAttributes(array("sub_id" => $id));
        foreach ($model as $key => $value) {
            echo "<div class='col-md-6'>
                    <h4>".Func::xssClear($value->title)."</h4>
                        <ul>
                        <li>";
                    $this->findQuestion($value->category_id);

            echo "</li>
                        </ul>
                  </div>";
        }
    }

    public function findQuestion($id){
        $model = HelpQuestions::model()->findAll("category_id = :cid",array(":cid" => $id));
        foreach ($model as $key => $value) {
            echo "<a href='".Yii::app()->createUrl('yardim/musterihizmetleri',array("id"=>Func::buildId($value->question_id,$value->question)))."' class='questionlink'>$value->question</a>";
        }
    }

}