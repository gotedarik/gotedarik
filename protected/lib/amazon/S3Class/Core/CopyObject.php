<?php

namespace S3Class\Core;

class CopyObject extends Model{
	
	public function __construct($client){
		self::$client	= 	$client;
	}
	
	public function run(){
		$array=array(
				'Bucket'     => self::$targetBucket,
				'Key'        => $this->targetFileKeyName,
				'CopySource' => "{$this->sourceBucket}/{$this->sourceFileKeyName}",
			);
		
		$this->result=self::$client->copyObject($array);
		return $this;
	}
}

?>