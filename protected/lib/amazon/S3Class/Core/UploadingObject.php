<?php

namespace S3Class\Core;

class UploadingObject extends Model{
	
	
	public function __construct($client){
		self::$client	= 	$client;
	}
	
	public function run(){
		$array=array(
				'Bucket'       => self::$targetBucket,
				'Key'          => $this->targetFileKeyName,
				'SourceFile'   => $this->thisFile,
				'ContentType'  => $this->contentType,
				'CacheControl' => $this->cacheControl,
				'Expires'	   => $this->expires,
				'ACL'          => $this->acl,
				'StorageClass' => $this->storageClass,
				'Metadata'     => $this->metaData,
			);
		
		$this->result=self::$client->putObject($array);
		return $this;
	}
	
	
}

?>