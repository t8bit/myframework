<?php
//debug
//include('../settings.php');
//include('../core/db.class.php');
//debug

class users extends db{
	function __construct()
	{
		$this->connect();
	}
	
	function login($user,$pass)
	{
		$query="SELECT password from users WHERE username='$user'";
		$res=$this->get($query);
		if($res[0]->password==$pass)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getId($user)
	{
		$query="SELECT id FROM users WHERE username='$user'";
		$res=$this->get($query);
		return $res[0]->id;
	}
	
}
?>
