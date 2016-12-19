<?php 

class News_Que
{
	

	public static function homeNews()
	{
		

	    $criteria = new CDbCriteria;
	    $criteria->condition = "status = :status";
	    $criteria->params = array(":status" => 1);
	    $criteria->order = "dateadd DESC";
	    $criteria->limit = 10;

	    $model= News::model()->findAll($criteria);

		$arr=self::buildArr($model);
		
		$action="que_".strtolower(Yii::app()->controller->action->id);
		Yii::app()->cache->set($action,serialize($arr),60*60*24*30);

	}

	public static function buildArr($model)
	{
		$arr=array();
		foreach($model as $key=>$value)
		{
			$arr[$key]=$value;
		}

		return $arr;
	}	
}