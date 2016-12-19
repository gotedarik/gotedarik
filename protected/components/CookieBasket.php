<?php

class CookieBasket
{
	
	public static function set($productid, $arr=array())
	{
		$get=self::getAll();

        $critearia = new CDbCriteria;
        $critearia->select = "t.*,productimages.imageS_s3url as imageS";
        $critearia->join = "inner join productimages on (productimages.products_id = t.products_id)";
        $critearia->condition = "imagetype = :imgtype && t.products_id = :pid";
        $critearia->params = array(
            ":imgtype" => 0,
            ":pid" => $productid
        );
        $model = Products::model()->find($critearia);

        if(count($model)!= 0){
            $get[$productid]=array(
                "products_id" => $productid,
                "name" => $model->name,
                "img" => $model->imageS,
                "price" => $model->price,
                "code" => $model->code,
                "currency" => $model->currency,
                "params"=>$arr,
            );
        }


		Yii::app()->request->cookies['basket'] = new CHttpCookie('basket', json_encode($get));
	}

	public static function delete($productid)
	{
		$get=self::getAll();

		if(isset($get[$productid]))
		{
			unset($get[$productid]);
		}

		Yii::app()->request->cookies['basket'] = new CHttpCookie('basket', json_encode($get));
	}

	public static function has($productid)
	{
		$get=self::getAll();

		if(isset($get[$productid]))
		{
			return true;
		}
		
	}


	public static function getAll()
	{
		if(empty(Yii::app()->request->cookies['basket']))
		{
			return array();
		}else{
			$get=Yii::app()->request->cookies['basket'];
			return json_decode($get,true);
		}
		
	}

	public static function deleteAll()
	{
		unset(Yii::app()->request->cookies['basket']);
	}
}