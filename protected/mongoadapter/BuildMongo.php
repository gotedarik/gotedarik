<?php


class BuildMongo
{
	private $where=array();

	private $order=array();

	public function addWhere($arr)
	{
		$this->where=(array_merge($this->where,$arr));
	}



	public function getWhere()
	{
		return $this->where;
	}	


	public function addOrder($arr)
	{
		$this->order=(array_merge($this->order,$arr));
	}



	public function getOrder()
	{
		return $this->order;
	}	
}