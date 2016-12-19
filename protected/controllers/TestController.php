<?php
class TestController extends Controller
{


	public function actionTest()
	{
		echo "text";
		$uri = "mongodb://user:pass@host:port/db";
$client = new MongoClient($uri);
$db = $client->selectDB("db");

	}

}