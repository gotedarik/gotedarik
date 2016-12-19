<?php

namespace S3Class\Core;

class ListingObject extends Model{
	
	public function __construct($client){
		self::$client 	= 	$client;
	}
	
	public function run(){
		$array=array(
				'Bucket'     => $this->sourceBucket,
			);
		
		$this->result= self::$client->listObjects($array);
		return $this;
	}
}

?>