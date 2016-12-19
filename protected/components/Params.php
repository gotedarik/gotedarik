<?php

class Params 
{
	//comment
	 public function get($param){
		return $this->arrays($param);
	 }
	 
	 private function arrays($param){
		 $array=array(
			
			'deleted'=>array(
				0=>'Hayır',
				1=>'Evet',
			),
			
			'status'=>array(
				0=>'Kapalı',
				1=>'Açık',
			),

			'product_status'=>array(
				0=>'Yayında Değil',
				1=>'Yayında',
				2=>'Silinmiş',
				3=>'Onaylanmamış',
			),

			'product_viewed'=>array(
				1=>'Gösteriliyor',
				0=>'Gösterilmiyor',
				
			),

			'salestype'=>array(
				1=>'Sabit Fiyat',
				2=>'İhale Usulü',
			),
			
			'currency'=>array(
				""=>"",
				1=>'TL',
				2=>'USD',
				3=>'EU',
			),

			'search_pagesize'=>array(
				30=>'30 Adet',
				60=>'60 Adet',
				90=>'90 Adet'
			),

			'social'=>array(
				1=>"Facebook",
				2=>"Twitter",
				3=>"Linkedin",
                4=>"İnstagram"
			),

            'read_status' =>array(
                1 => "Okundu",
                0 => "Okunmadı"
            ),
		 );
		 
		 return $array[$param];
	 }
	
	
	public static function getParams($param){
		$params = new Params;
		return $params->get($param);
	}
	
	public static function getParams_($param,$id){
		$params = new Params;
		$array=$params->get($param);
		return $array[$id];
	}
}