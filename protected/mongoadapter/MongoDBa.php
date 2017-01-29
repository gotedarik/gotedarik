<?php

use Smce\Sm;


class MongoDBa
{
	private static $mongo;

	private static $conn=false;

	private function mongoInit()
	{
		
		$seeds='mongodb://'.Yii::app()->params["mongodb"]["username"].':'.Yii::app()->params["mongodb"]["password"].'@localhost:27017/'.Yii::app()->params["mongodb"]["db"];

		$options=array();
		/*
		$options=array(
			'username' => Yii::app()->params["mongodb"]["username"],
		    'password' => Yii::app()->params["mongodb"]["password"],
		    'db'       => Yii::app()->params["mongodb"]["db"]
		);
		*/

		self::$mongo=$this->getMongoClient($seeds,$options);
	

	}

	private function getMongoClient($seeds = "", $options = array(), $retry = 7) {

	    try {

	    	self::$conn=true;
	        return new MongoClient($seeds, $options);

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

 

	public function getMongo($dbname)
	{
		
		if(!self::$conn)
		{
			$this->mongoInit();
		}

		if(isset(self::$mongo) && self::$mongo!=null)
		{
			$mongo=self::$mongo->selectDB($dbname);
			if($mongo==$dbname)
			{
				return $mongo;
			}
		}
		
		

	}
}