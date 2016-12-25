<?php

class MoProductgroups extends MongoDBa
{
	private static $dbname="gotedarik";

	private static $tablename="productgroups";

	private static $table;

	private static $db;

	private $int=array("productgroup_id","sub_id","status");

	private $datetime=array("dateadd");


	public function __construct()
	{

		self::$table=$this->setMongo(self::$dbname,self::$tablename);


	}

	public function insert($arr)
	{

		self::$table->insert($arr);

	}

	public function search($str)
	{
		 $where = array('name' =>  new MongoDB\BSON\Regex ( '^'.$str,'i'),"status"=>1); 
		 return self::$table->find($where);
	}

	public function update($id,$arr)
	{
		$where=array("productgroup_id"=>$id);
		self::$table->update($where,array('$set'=>$arr));
	}


	public function buildArr($model)
	{
		$arr=array();

		foreach($model as $key=>$value)
		{
			if(in_array($key,$this->int))
			{
				$arr[$key]=$value+0;;
				
			}elseif(in_array($key,$this->datetime)){
				$arr[$key]=new MongoDB\BSON\UTCDateTime(strtotime($value)*1000);
			}else{
				$arr[$key]=$value;
			}
		}

		return $arr;
	}


	public function re()
	{
		
		$get=self::$table->find();

		foreach($get as $key=>$value)
		{
			self::$table->delete(array(
				"_id"=>$value->_id,
			));
		}
		

		$model=Productgroup::model()->findAll();

		foreach($model as $key=>$value)
		{
			$this->insert($this->buildArr($value));
		}
	}

}