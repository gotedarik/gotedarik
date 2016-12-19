<?php


namespace S3Class;


require dirname(__FILE__)."/Core/Model.php";
require dirname(__FILE__)."/Core/CopyObject.php";
require dirname(__FILE__)."/Core/DeletingObject.php";
require dirname(__FILE__)."/Core/ImageObject.php";
require dirname(__FILE__)."/Core/ListingObject.php";
require dirname(__FILE__)."/Core/UploadingObject.php";

use Aws\S3\S3Client;
use S3Class\Core\UploadingObject;
use S3Class\Core\CopyObject;
use S3Class\Core\DeletingObject;
use S3Class\Core\ListingObject;
use S3Class\Core\GetObject;
use S3Class\Core\ImageObject;

class S3
{
	private static $client;
	
	public function __construct($array=array()){
		self::$client = S3Client::factory(array(
			'credentials'=>array(

				'key'    => isset($array["key"])	?	trim($array["key"]):"",
				'secret' => isset($array["secret"])	?	trim($array["secret"]):"",
			),
			'region' => isset($array["region"])	?	trim($array["region"]):"",
			'version' => isset($array["version"])	?	trim($array["version"]):""
		));
	}
	
	public static function uploadingObject(){
		return new UploadingObject(self::$client);
	}
	
	public static function copyObject(){
		return new CopyObject(self::$client);
	}
	
	public static function deletingObject(){
		return new DeletingObject(self::$client);
	}
	
	public static function listingObject(){
		return new ListingObject(self::$client);
	}
	
	public static function getObject(){
		return new GetObject(self::$client);
	}
	
	public static function imageObject(){
		return new ImageObject(self::$client);
	}
	
	
}
