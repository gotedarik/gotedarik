<?php 

class Mongomodel
{
	private static $mongo;

	public function __construct($mongo)
	{
		self::$mongo=$mongo;
	}

	public function insert($params)
	{	
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($params);
		
		self::$mongo->executeBulkWrite(MongoDBa::$sellectDB.".".MongoDBa::$collection, $bulk);
	}

	public function update($where,$params)
	{	
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->update($where,$params);
		
		self::$mongo->executeBulkWrite(MongoDBa::$sellectDB.".".MongoDBa::$collection, $bulk);
	}

	public function delete($params)
	{	
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->delete($params);
		
		self::$mongo->executeBulkWrite(MongoDBa::$sellectDB.".".MongoDBa::$collection, $bulk);
	}

	public function count($params)
	{	
		return count(iterator_to_array($this->find($params)));
	}

	public function find($params=array(),$options=array())
	{	
		$query = new MongoDB\Driver\Query($params, $options);
		
		return self::$mongo->executeQuery(MongoDBa::$sellectDB.".".MongoDBa::$collection, $query);
	
	}

	public function aggregate($params)
	{	
		$pr=array(
			"aggregate"=>MongoDBa::$collection,
			"pipeline"=>$params,
		);

		$query = new MongoDB\Driver\Command($pr);
		
		return self::$mongo->executeCommand(MongoDBa::$sellectDB, $query);
	
	}
}