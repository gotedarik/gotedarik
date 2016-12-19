<?php 


class Build_Que
{
	public static function get($str)
	{
		$action="que_".$str;
		$arr=unserialize(Yii::app()->cache->get($action));

		if(is_array($arr))
		{
			return $arr;
		}else{
			return array();
		}
	}

	
}