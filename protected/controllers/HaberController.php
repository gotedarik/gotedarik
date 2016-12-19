<?php

class HaberController extends Controller
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


	public function actionView($id)
	{
		
		$Func=new Func;

		
		$model = $this->loadModel($id);

		$keywords=$model->title;
		$keys=explode(" ",$model->title);
		foreach($keys as $key=>$value)
		{
			$keywords.=",".$value;
		}
		
		Yii::app()->params["site_title"]=$model->title." - ".Yii::app()->name;
        Yii::app()->params["site_description"]=mb_substr($model->content,0,260,"UTF-8");
        Yii::app()->params["site_keywords"].=",".$keywords;
        Yii::app()->params["site_image"]=Yii::app()->params["cdn"].$model->imgS;

		$ip = $Func->getIP();
		$criteria1 = new CDbCriteria;
		$criteria1->condition = "news_id = :nid and ip = :ip ";
		$criteria1->params = array("ip" => $ip, ':nid' => $id);

		$model1 = Newsreadip::model()->find($criteria1);

		if(count($model) > 0){
			if(count($model1) == 0){

				$model->read++;
				$model->update();

				$model1 = new Newsreadip;

				$model1->news_id = $id;
				$model1->ip = $ip;
				$model1->save();
			}

			$this->render('view',array(
				'model' => $model,
			));
		}


	}



	public function actionListe()
	{
		$this->layout = "//layouts/frontLayout/productLayout";

		Yii::app()->params["site_title"]="Bizden Haberler - ".Yii::app()->name;
        Yii::app()->params["site_description"]="Organize Tedarik Şirketinin en son haber listesi";
        Yii::app()->params["site_keywords"].=", bizden haberler, haberler";

		$criteria = new CDbCriteria;
		$criteria->condition = "status = :status";
		$criteria->params = array(":status" => 1);
		$criteria->order = "news_id DESC";

		$itemcount = News::model()->count($criteria);

		$pages = new CPagination($itemcount);
		$pages->setPageSize(Yii::app()->params["listPerPage"]);
		$pages->applyLimit($criteria);



		$this->render("liste",array(
				'model' => News::model()->findAll($criteria),
				'item_count' => $itemcount,
				'page_size' => Yii::app()->params["listPerPage"],
				'items_count' => $itemcount,
				'pages' => $pages
		));
	}


	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}