<?php

use Smce\Sm;


class MongoDBa
{
	private static $mongo;

	private static $conn=false;

	public static $sellectDB;

	public static $collection;

	private static $table;

	private function mongoInit()
	{
		
		$seeds='mongodb://'.Yii::app()->params["mongodb"]["username"].':'.Yii::app()->params["mongodb"]["password"].'@localhost:27017/'.Yii::app()->params["mongodb"]["db"];
		
		//$options=Yii::app()->params["mongodb"];


		self::$mongo=$this->getMongoClient($seeds);
			
		self::$table = new Mongomodel(self::$mongo);
	}

	private function getMongoClient($seeds = "", $options = array(), $retry = 7) {

	    try {

	    	self::$conn=true;
	        return new MongoDB\Driver\Manager($seeds, $options);

	    } catch(MongoConnectionException $e) {


	        
	    	self::$conn=false;
	    }

	    if ($retry > 0) {

	        return $this->getMongoClient($seeds, $options, --$retry);

	    }else{
	    	echo "mg conn error;";
	    	exit;
	    }

	    
	}

 

	public function setMongo($dbname,$collection)
	{
		
		if(!self::$conn)
		{
			$this->mongoInit();
		}

		self::$sellectDB=$dbname;
		
		self::$collection=$collection;

		return self::$table;

	}

	

}