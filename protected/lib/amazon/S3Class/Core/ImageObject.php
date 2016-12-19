<?php

namespace S3Class\Core;

class ImageObject extends Model{
	
	public function __construct($client){
		self::$client	= 	$client;
		$dir=__DIR__."/tmp";
		if(!is_dir($dir))
			mkdir($dir,777); 
	}
	
	
	public function run(){
		if(count($this->resizeTo)<1 && count($this->cropTo)<1 && empty($this->rotateTo) && empty($this->formatTo)){
			$this->result=array("result"=>"false","message"=>"select action (resizeTo,cropTo,rotateTo,formatTo)");
			return $this;
		}
		
		$exFileName=explode("/",$this->sourceFileKeyName);
		$tmpFile=__DIR__."/tmp/".time()."_".rand(1000000,99999999999)."_".end($exFileName);
		$array=array(
				'Bucket'     	=> $this->sourceBucket,
				'Key'  			=> $this->sourceFileKeyName,
				'SaveAs' 		=> $tmpFile,
			);
		
		$this->result.=self::$client->getObject($array);
		
		if(count($this->resizeTo)>0){
			$thumb = \PhpThumbFactory::create($tmpFile);
			$thumb->resize($this->resizeTo["a"],$this->resizeTo["b"]);
			$thumb->save($tmpFile);
		}elseif(count($this->cropTo)>0){
			$thumb = \PhpThumbFactory::create($tmpFile);
			$thumb->crop($this->cropTo["a"],$this->cropTo["b"],$this->cropTo["c"],$this->cropTo["d"]);
			$thumb->save($tmpFile);
		}elseif(!empty($this->rotateTo)){
			$thumb = \PhpThumbFactory::create($tmpFile);
			$thumb->rotateImageNDegrees($this->rotateTo);
			$thumb->save($tmpFile);
		}elseif(!empty($this->formatTo)){
			$exTmpFile=explode(".",$tmpFile);
			$tmpFileNewName=str_replace(end($exTmpFile),$this->formatTo,$tmpFile);
			
			if(strtolower($this->formatTo)=="tif"){
				$image = new Imagick($tmpFile);
				$image->setImageFormat($this->formatTo);
				$image->writeImage($tmpFileNewName);
				chmod($tmpFile,0777);
			}else{
				$thumb = \PhpThumbFactory::create($tmpFile);
				$thumb->save($tmpFileNewName,$this->formatTo);
			}
			unlink($tmpFile);
			$tmpFile=$tmpFileNewName;
			
			if($this->clear==true){
				$array=array(
						'Bucket'     => $this->sourceBucket,
						'Key'  		 => $this->sourceFileKeyName
					);
				
				$this->result.=self::$client->deleteObject($array);
			}
			$this->sourceFileKeyName=str_replace(end($exTmpFile),$this->formatTo,$this->sourceFileKeyName);
		}
		
		$array=array(
				'Bucket'       => $this->sourceBucket,
				'Key'          => $this->sourceFileKeyName,
				'SourceFile'   => $tmpFile,
				'ContentType'  => $this->contentType,
				'ACL'          => $this->acl,
				'StorageClass' => $this->storageClass,
				'Metadata'     => $this->metaData,
			);
		
		$this->result.=self::$client->putObject($array);
		unlink($tmpFile);
		return $this;
	}
}

?>