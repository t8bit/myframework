<?php
class database_values
{
	private $database;
	private $value;
	
	function __construct($database,$value)
	{
		$this->database=$database;
		$this->value=$value;
	}
	
	function get_database()
	{
		return $this->database;
	}
	
	function get_value()
	{
		return $this->value();
	}
}
?>
