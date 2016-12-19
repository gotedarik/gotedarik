<?php

namespace S3Class\Core;

class GetObject extends Model{
	
	public function __construct($client){
		self::$client	= 	$client;
	}
	
	public function run(){
		$array=array(
				'Bucket'     				 => $this->sourceBucket,
				'Key'  						 => $this->sourceFileKeyName,
				'Range' 					 => $this->range,
				'SaveAs' 					 => $this->saveAs,
				'ResponseContentType'        => $this->responseContentType,
				'ResponseContentLanguage'    => $this->responseContentLanguage,
				'ResponseContentDisposition' => $this->responseContentDisposition,
				'ResponseCacheControl'       => $this->responseCacheControl,
				'ResponseExpires'            => $this->responseExpires,
			);
		
		$this->result= self::$client->getObject($array);
		return $this;
	}
}

?>