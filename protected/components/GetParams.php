<?php


class GetParams
{

	

	public static function getCity($id)
	{
		$modelCitys=Citys::model()->findByPk($id);

		return $modelCitys;
	}

}