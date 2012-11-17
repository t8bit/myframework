<?php
	class module
	{
		private $name;
		private $opt1;
		private $opt2;
		
		function __construct($name,$opt1,$opt2)
		{
			$this->name="/modules/".$name.'.php';
			$this->opt1=$opt1;
			$this->opt2=$opt2;
			//echo $this->name.'<br>';
		}
		function get_name()
		{
			return $this->name;
		}
		function get_opt1()
		{
			return $this->opt1;
		}
		function get_opt2()
		{
			return $this->opt2;
		}
	}
?>
