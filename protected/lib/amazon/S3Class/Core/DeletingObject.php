<?php

namespace S3Class\Core;

class DeletingObject extends Model{
	
	public function __construct($client){
		self::$client	= 	$client;
	}
	
	public function run(){
		$array=array(
				'Bucket'     => $this->sourceBucket,
				'Key'  		 => $this->sourceFileKeyName
			);
		
		$this->result=self::$client->deleteObject($array);
		return $this;
	}
}

?>