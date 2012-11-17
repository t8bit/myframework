<?php
class route
{
	private $route;
	private $modules;
	private $design;
	private $design2;
	private $design3;
	private $path;
	private $includes;
	private $functions;
	private $functions2;
	
	function __construct($route,$modules,$design,$design2,$design3)
	{
		$this->find=0;
		$this->route=$route;
		$this->modules=$modules;
		$this->design=$design;
		$this->design2=$design2;
		$this->design3=$design3;
		$big=$_SERVER['DOCUMENT_ROOT'];
		$this->path=$big.'/'.folder."/";
		$this->includes=array();
	}
	
	function getName()
	{
		return $this->route;
	}
	
	function getRoute($route,$functions=0,$functions2=0)
	{
		$this->functions=$functions;
		$this->functions2=$functions2;
		if($route==$this->route)
		{
			$this->find=1;
			$this->loadModules();
			$data=$this->loadDesign();
		}
		return $data;
	}
	
	function loadModules()
	{
		global $opt;
		foreach ($this->modules as $module)
		{
			if ($this->functions=='') 
			{
				$opt=$module->get_opt1();
			}
			else 
			{
				$opt=$module->get_opt2();	
			}
			
			$this->includes[]=$this->path.$module->get_name();
		}
	}
	function loadDesign()
	{
		if($this->functions=='')
		{
			$this->includes[]=$this->path.$this->design;
			return $this->includes;
		}
		else
		{
			if($this->functions2=='')
			{
				$this->includes[]=$this->path.$this->design2;
			}
			else
			{
				$this->includes[]=$this->path.$this->design3;
			}
		}
	}
		
	
	function getIncludes()
	{
		return $this->includes;
	}
}
?>
