<?php 

class Productgroup_Que
{
	

	public static function groupList()
	{
	
		if($arr=Yii::app()->cache->get("que_productsgroup_list"))
		{
			
			return unserialize($arr);
		}else {

			$modelProductgroup=Productgroup::model()->findAll(array(
				"condition"=>"sub_id=0 && status=1",
				'order'=>'name asc'
			));
					
			$action="que_productsgroup_list";
			Yii::app()->cache->set($action,serialize($modelProductgroup),60*30);

			return $modelProductgroup;


		}
		

	}


	
}