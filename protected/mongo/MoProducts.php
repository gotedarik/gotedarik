<?php

class MoProducts extends MongoDBa
{
	private static $dbname="organizetedarik";

	private static $tablename="products";

	private static $db;

	private static $table;

	private $int=array("products_id","suppliers_id","productgroup_id","deleted","admindeleted","status","salestype","cargopricetype","cargoprice","price","lastshowday","lastbidday","piece","startingprice","viewed","code","discount","currency","totalpoint","uservotecount","viewok","lastbidprice");

	private $datetime=array("dateadd","updatedateadd","lastshowdates");

	public function __construct()
	{

		self::$table=$this->setMongo(self::$dbname,self::$tablename);


	}

	public function insert($arr)
	{

		self::$table->insert($arr);

	}

	public function searchmain($text)
	{
		$where = array('$text' => array('$search'=>$text),'viewok'=>1,"lastshowdates"=>array('$gt'=>new MongoDB\BSON\UTCDateTime(time()*1000))); 

		$list=self::$table->aggregate(array(
		    array('$match'=>$where),
		    array('$limit'=>10),

		));
		$list=iterator_to_array($list);
		$list=$list[0]->result;	
		return $list;
	}

	public function search($arr=array(),$page,$pagesize)
	{	
		$skip=$pagesize*($page-1);
		$searchcontrol=false;

		 if(isset($arr["text"]) && !empty($arr["text"]))
		 { 
		 	 $searchcontrol=true;
		 	 $where['$text']=array('$search'=>$arr["text"]);
		 }

		 if(isset($arr["productgroup"]) && !empty($arr["productgroup"]))
		 {
		 	$searchcontrol=true;
		 	$where['productgroup_id']=(int)$arr["productgroup"];
		 }

		 if(isset($arr["pricestart"]) && !empty($arr["pricestart"]))
		 {
		 	$searchcontrol=true;
		 	$where['$or'][]['price']['$gt']=(int)$arr["pricestart"]-1;
		 }

		 if(isset($arr["priceend"]) && !empty($arr["priceend"]))
		 {
		 	$searchcontrol=true;
		 	$where['$or'][]['price']['$lt']=(int)$arr["priceend"];
		 }

		 if(isset($arr["salestype"]) && !empty($arr["salestype"]))
		 {
		 	$searchcontrol=true;
		 	$where['salestype']=(int)$arr["salestype"];
		 }

		  if(isset($arr["cargopricetype"]) && !empty($arr["cargopricetype"]))
		 {
		 	$searchcontrol=true;
		 	$where['cargopricetype']=(int)$arr["cargopricetype"]==2?0:(int)$arr["cargopricetype"];
		 }


	     $where["viewok"] = 1;
	     $where["lastshowdates"] =array('$gt'=>new MongoDB\BSON\UTCDateTime(time()*1000));
	    
	     if($searchcontrol==false)
	     {
	     	 $where = array("viewok"=>1,"lastshowdates"=>array('$gt'=>new MongoDB\BSON\UTCDateTime(time()*1000))); 
	     }
		
		if($skip==0 && isset($arr["product_id"]) && !empty($arr["product_id"]))
		{	
			 $where2["code"] = (int)$arr["product_id"];
			 $product=self::$table->find($where2);

			 if(count($product)>0)
			 {
			 	$pagesize--;
			 }

			 $where["code"]['$nin']=array((int)$arr["product_id"]);
		}

		$orderby="";
		if(isset($arr["orderby"]))
		{
			if($arr["orderby"]=="popularity")
			{
				$orderby=array('viewed'=>-1);
			}else if($arr["orderby"]=="price")
			{
				$orderby=array('price'=>1);
			}else if($arr["orderby"]=="price-desc")
			{
				$orderby=array('price'=>-1);
			}else if($arr["orderby"]=="date-desc")
			{
				$orderby=array('dateadd'=>-1);
			}else if($arr["orderby"]=="date")
			{
				$orderby=array('dateadd'=>1);
			}
		}

		if(!empty($orderby))
		{
			$list=self::$table->aggregate(array(
			    array('$match'=>$where),
			    array('$sort'=>$orderby),
			    array('$skip'=>$skip),
			    array('$limit'=>$pagesize),
			));

		}else{
			$list=self::$table->aggregate(array(
			    array('$match'=>$where),
			    array('$skip'=>$skip),
			    array('$limit'=>$pagesize),
			));
		}

		

		$where2=$where;

		if(isset($where2['productgroup_id']))
		{
			unset($where2['productgroup_id']);
		}
		
		$listA=self::$table->aggregate(array(
			 array('$match'=>$where2),
			 array('$project'=>array("productgroup_id"=>1)),
		));

		
		$productgroups=array();	
		$listA=iterator_to_array($listA);
		$listA=$listA[0]->result;	
		foreach($listA as $key=>$value)
		{
			
			$productgroups[]=$value->productgroup_id;
		}
		
		$count=self::$table->count($where);
		
		$list=iterator_to_array($list);
		$list=$list[0]->result;	

		if(isset($product) && count($product)>0)
		{
			$product=iterator_to_array($product);
			$list=array_merge($product,$list);
		}
		return array(
			"list"=>$list,
			'count'=>$count,
			"productgroups"=>$productgroups
		);

	}

	public function update($id,$arr)
	{
		$where=array("products_id"=>(int)$id);
		$count=self::$table->count($where);
		
		if($count==0)
		{
			self::$table->insert($arr);
		}else{
			self::$table->update($where,array('$set'=>$arr));
		}
		
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

		$arr["productgroup_name"]=Func::getProductgroup($model->productgroup_id)->name;
		$arr["imageS"]=$this->getImages($model->products_id);

		return $arr;
	}

	public function getImages($products_id)
	{


		$criteria=new CDbCriteria;
		$criteria->condition = "products_id=:products_id && imagetype=0";
		$criteria->params = array (	
			':products_id' =>$products_id,
		);

		$modelProductimages=Productimages::model()->find($criteria);


		if(isset($modelProductimages->imageS))
		{
			return $modelProductimages->imageS;
		}else{
			return "";
		}
		
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
		

		$model=Products::model()->findAll();

		foreach($model as $key=>$value)
		{
			$this->insert($this->buildArr($value));
		}
	}

}