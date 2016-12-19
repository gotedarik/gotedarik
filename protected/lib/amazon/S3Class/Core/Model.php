<?php

namespace S3Class\Core;

abstract class Model{
	
	protected static $client;
	
	protected static $targetBucket="";
	protected $targetFileKeyName="";
	
	protected $thisFile="";
	
	protected $sourceBucket="";
	protected $sourceFileKeyName="";
	
	protected $contentType="";
	protected $cacheControl="";
	protected $expires="";
	protected $acl="";
	protected $storageClass="";
	protected $metaData=array();
	
	protected $saveAs="";
	protected $range="";
	protected $responseContentType="";
	protected $responseContentLanguage="";
	protected $responseContentDisposition="";
	protected $responseCacheControl="";
	protected $responseExpires="";
	
	protected $resizeTo=array();
	protected $cropTo=array();
	protected $rotateTo;
	protected $formatTo;
	protected $clear=false;
	
	protected $result="";
	
	public function printR(){
		$str="<pre>".$this->result."</pre>";
		echo $str;
	}
	
	public function get(){
		return $this->result;
	}
	
		
	public function setTargetBucket($targetBucket){
		self::$targetBucket=$targetBucket;
		return  $this;
	}
	
	public function setTargetFileKeyName($targetFileKeyName){
		$this->targetFileKeyName=$targetFileKeyName;
		return  $this;
	}
	
	public function setThisFile($thisFile){
		$this->thisFile=$thisFile;
		return  $this;
	}
	
	public function setSourceBucket($sourceBucket){
		$this->sourceBucket=$sourceBucket;
		return  $this;
	}
	
	public function setSourceFileKeyName($sourceFileKeyName){
		$this->sourceFileKeyName=$sourceFileKeyName;
		return  $this;
	}
	
	public function setContentType($contentType){
		$this->contentType=$contentType;
		return  $this;
	}

	public function setCacheControl($cacheControl){
		$this->cacheControl=$cacheControl;
		return  $this;
	}

	public function setExpires($expires){
		$this->expires=$expires;
		return  $this;
	}
	
	public function setAcl($Acl){
		$this->acl=$Acl;
		return  $this;
	}
	
	public function setStorageClass($storageClass){
		$this->storageClass=$storageClass;
		return  $this;
	}
	
	public function setMetadata($metaData){
		$this->metaData=$metaData;
		return  $this;
	}
	
	public function setRange($range){
		$this->range=$range;
		return  $this;
	}
	
	public function setSaveAs($saveAs){
		$this->saveAs=$saveAs;
		return  $this;
	}
	
	public function setResponseContentType($responseContentType){
		$this->responseContentType=$responseContentType;
		return  $this;
	}
	
	public function setResponseContentLanguage($responseContentLanguage){
		$this->responseContentLanguage=$responseContentLanguage;
		return  $this;
	}
	
	public function setResponseContentDisposition($responseContentDisposition){
		$this->responseContentDisposition=$responseContentDisposition;
		return  $this;
	}
	
	public function setResponseCacheControl($responseCacheControl){
		$this->responseCacheControl=$responseCacheControl;
		return  $this;
	}
	
	public function setResponseExpires($responseExpires){
		$this->responseExpires=$responseExpires;
		return  $this;
	}
	
	public function resizeTo($a=100,$b=100){
		$this->resizeTo=array(
			"a"=>$a,
			"b"=>$b,
		);
		return  $this;
	}
	
	public function cropTo($a=100,$b=100,$c=0,$d=0){
		$this->cropTo=array(
			"a"=>$a,
			"b"=>$b,
			"c"=>$c,
			"d"=>$d,
		);
		return  $this;
	}
	
	public function rotateTo($rotateTo){
		$this->rotateTo=$rotateTo;
		return  $this;
	}
	
	public function formatTo($formatTo){
		$this->formatTo=$formatTo;
		return  $this;
	}
	
	public function clear($clear=false){
		$this->clear=$clear;
		return  $this;
	}
}

?>