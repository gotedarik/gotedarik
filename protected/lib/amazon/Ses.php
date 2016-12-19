<?php

use Aws\Ses\SesClient;

class Ses
{
	var $client;
	
	public $from_name		="JUMBADA";
	public $from_email		="no-reply@jumbada.com";
	public $from			="JUMBADA";
	public $to_name			="";
	public $to_email 		="";
	public $to		 		="no-reply@jumbada.com";
	public $replyto			="no-reply@jumbada.com";
	public $returnpath		="";
	public $subject			="";
	public $messageBody		="";
	public $htmlMessageBody	="";
	
	public function __construct()
	{
		$this->client = SesClient::factory(Sm::app()->amazon["eu-west-1"]);
	}
	
	public function __set(string $attribute, $value="" ){
		if(property_exists($this,$attribute)){
			$this->$attribute=$value;
		}
	}
	
	public function SendEmailFormatted()
	{

	    if($this->strposa($this->to_email,Controller::$blockemailprefix)===false || in_array($this->to_email,Controller::$allowemail))
	    {
	    	$MoSesbounces=new MoSesbounces;
		
			if(!$MoSesbounces->has_email($this->to_email))
			{
				$this->to= "\"".mb_encode_mimeheader(trim($this->to_name), mb_internal_encoding(),"Q")."\" <".$this->to_email.">";
				$this->from= "\"".mb_encode_mimeheader(trim($this->from_name), mb_internal_encoding(),"Q")."\" <".$this->from_email.">";
				
				$msg = array();
				$msg['Source'] = $this->from;
				//ToAddresses must be an array
				$msg['Destination']['ToAddresses'][] = $this->to;
				
				$msg['Message']['Subject']['Data'] = $this->subject;
				$msg['Message']['Subject']['Charset'] = "UTF-8";
				
				$msg['Message']['Body']['Text']['Data'] =$this->messageBody;
				$msg['Message']['Body']['Text']['Charset'] = "UTF-8";
				$msg['Message']['Body']['Html']['Data'] =$this->htmlMessageBody;
				$msg['Message']['Body']['Html']['Charset'] = "UTF-8";
						
				
				$result = $this->client->sendEmail($msg);
				return $result;
			}

	    }
	 
	}

	public function client()
	{
		return $this->client;
	}

	private function strposa($haystack, $needles=array(), $offset=0) 
	{
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
	}


}

?>

