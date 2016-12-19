<?php


class Getcache
{

	public static function getCitysList()
	{
		$modelCitys=Citys::model()->findAll();

		return $modelCitys;
	}

	public static function getCitysListDropDown()
	{
		$modelCitys=Citys::model()->findAll();

		$arr=array(""=>"");

		foreach($modelCitys as $key=>$value)
		{
			$arr[$value->citys_id]=$value->name;
		}

		return $arr;
	}
}