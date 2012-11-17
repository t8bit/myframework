<?php
class db
{
	protected $link;
	
	function connect()
	{
		$this->link=new mysqli(server,user,pass,db);
	}
	
	function set($query)
	{
		$res_query=$this->link->query($query);
		return $res_query;
	}
	
	function get($query)
	{
		$data_array=array();
		$res_query=$this->link->query($query);
		$data=$res_query->fetch_object();
		while($data!=null)
		{
			$data_array[]=$data;
			$data=$res_query->fetch_object();
		}
		return $data_array;
	}
	
	function __destruct()
	{
		$this->link->close();
	}
}
?>
