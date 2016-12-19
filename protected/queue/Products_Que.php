<?php 

class Products_Que
{
	

	public static function homeProductBid()
	{
		$criteria=new CDbCriteria;
		$criteria->select="*, t.name as name, pg.name as productgroup_name, pi.imageS as imageS";
		$criteria->condition = "t.salestype=2 && t.viewok=1 &&  t.lastshowdates>:lastshowdates";
		$criteria->params = array (	
			':lastshowdates' =>date("Y-m-d H:i:s"),
		);
		$criteria->join="inner join productgroup pg on(t.productgroup_id=pg.productgroup_id) inner join productimages pi on(t.products_id=pi.products_id && imagetype=0)";
		$criteria->order = 'RAND()';
		$criteria->limit=6;

		$model= Products::model()->findAll($criteria);


		$arr=self::productBuildArr($model);

		$action="que_".strtolower(Yii::app()->controller->action->id);
		Yii::app()->cache->set($action,serialize($arr),60*60*24*30);
	}

	public static function opportunityproducts()
	{
		$criteria=new CDbCriteria;
		$criteria->select="*, t.name as name, pg.name as productgroup_name, pi.imageS as imageS";
		$criteria->condition = "t.salestype=1 && t.viewok=1 &&  t.lastshowdates>:lastshowdates && discount>0";
		$criteria->params = array (	
			':lastshowdates' =>date("Y-m-d H:i:s"),
		);
		$criteria->join="inner join productgroup pg on(t.productgroup_id=pg.productgroup_id) inner join productimages pi on(t.products_id=pi.products_id && imagetype=0)";
		$criteria->order = 'RAND()';
		$criteria->limit=12;

		$model= Products::model()->findAll($criteria);


		$arr=self::productBuildArr($model);

		$action="que_".strtolower(Yii::app()->controller->action->id);
		Yii::app()->cache->set($action,serialize($arr),60*60*24*30);
	}

	public static function choosetoseizeproducts()
	{
		$criteria=new CDbCriteria;
		$criteria->select="*, t.name as name, pg.name as productgroup_name, pi.imageS as imageS";
		$criteria->condition = "t.salestype=1 && t.viewok=1 &&  t.lastshowdates>:lastshowdates";
		$criteria->params = array (	
			':lastshowdates' =>date("Y-m-d H:i:s"),
		);
		$criteria->join="inner join productgroup pg on(t.productgroup_id=pg.productgroup_id) inner join productimages pi on(t.products_id=pi.products_id && imagetype=0)";
		$criteria->order = 'RAND()';
		$criteria->limit=12;

		$model= Products::model()->findAll($criteria);


		$arr=self::productBuildArr($model);


		$action="que_".strtolower(Yii::app()->controller->action->id);
		Yii::app()->cache->set($action,serialize($arr),60*60*24*30);
	}

	public static function recentlyadded()
	{
		$criteria=new CDbCriteria;
		$criteria->select="*, t.name as name, pg.name as productgroup_name, pi.imageS as imageS";
		$criteria->condition = "t.salestype=1 && t.viewok=1 &&  t.lastshowdates>:lastshowdates";
		$criteria->params = array (	
			':lastshowdates' =>date("Y-m-d H:i:s"),
		);
		$criteria->join="inner join productgroup pg on(t.productgroup_id=pg.productgroup_id) inner join productimages pi on(t.products_id=pi.products_id && imagetype=0)";
		$criteria->order = 'dateadd desc';
		$criteria->limit=12;

		$model= Products::model()->findAll($criteria);


		$arr=self::productBuildArr($model);


		$action="que_".strtolower(Yii::app()->controller->action->id);
		Yii::app()->cache->set($action,serialize($arr),60*60*24*30);
	}

	
	public static function productBuildArr($model)
	{
		$arr=array();
		foreach($model as $key=>$value)
		{
			$arr[$key]=$value;
		}

		return $arr;
	}	

	
}