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

		self::$db=$this->getMongo(self::$dbname);

		self::$table = new MongoCollection(self::$db, self::$tablename);

	}

	public function insert($arr)
	{

		self::$table->insert($arr);

	}

	public function update($id,$arr)
	{
		$where=array("productgroup_id"=>$id);
		self::$table->update($where,array('$set'=>$arr));
	}


	public function search($str)
	{
		 $where = array('name' =>  new MongoRegex('/^'.$str.'/i'),"status"=>1); 
		 return self::$table->find($where);
	}


	public function remove($id)
	{
		$realmongoid = new MongoId($id);

		$where = array('_id' => $realmongoid); 
		
		return self::$table->remove($where);
	}

	public function re()
	{
		
		$get=self::$table->find();

		
		foreach($get as $key=>$value)
		{

			$this->remove((string)$value["_id"]);
			
		}
		

		$model=Productgroup::model()->findAll();

		foreach($model as $key=>$value)
		{
			$this->insert($this->buildArr($value));
		}
	}


	public function buildArr($model)
	{
		$arr=array();

		foreach($model as $key=>$value)
		{
			if(in_array($key,$this->int))
			{
				$arr[$key]=$value+0;
				
			}elseif(in_array($key,$this->datetime)){
				$arr[$key]=new MongoDate(strtotime($value));
			}else{
				$arr[$key]=$value;
			}
		}

		return $arr;
	}

}