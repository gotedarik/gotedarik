<?php

use Aws\Sqs\SqsClient;

class Sqs
{


	var $client;
	
	public function __construct()
	{
		$this->client = SqsClient::factory(Sm::app()->amazon["eu-central-1"]);
	}


	public function get($url)
	{
		$result = $this->client->receiveMessage(array(
		    'QueueUrl' => $url,
		    'WaitTimeSeconds' => 20,
		));

		return $result->getPath('Messages');
	}

	public function delete($url,$receipthandle)
	{
		$result = $this->client->deleteMessage(array(
		    'QueueUrl' => $url,
		    'ReceiptHandle' => $receipthandle,
		));
	}
}