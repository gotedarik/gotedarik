<?php

require dirname(__FILE__)."/../lib/amazon/S3Class/S3.php";

class AmazonFunc{

	public static function upload($file, $filename)
	{
		$S3=new S3Class\S3(Yii::app()->params["amazon"]["eu-central-1"]);
		

		$amazons30=$S3::uploadingObject()
							->setTargetBucket("organizetedarik") 
							->setThisFile($file)
							->setTargetFileKeyName($filename)
							->setAcl("public-read-write")
							->setContentType(mime_content_type($file))
	        				->setCacheControl('max-age=15552000')
							->run()->get();

		return array(
			"url"=>$amazons30["ObjectURL"],
		);
	}


	public static function delete($filenames)
	{

		$S3=new S3Class\S3(Yii::app()->params["amazon"]["eu-central-1"]);
		
		foreach($filenames as $key=>$value)
		{
			if(!empty($value)){
				$S3::deletingObject()
				->setSourceBucket("organizetedarik")
				->setSourceFileKeyName($value)
				->run();

				
			}
			
		}	
			
	
	}
}