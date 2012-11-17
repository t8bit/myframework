<?php
//THIS TOOL CREATES STUFF WITH MAGIC
include('../settings.php');
include('../core/core.php');
include('../mrouter/routes.php');
class dbv
{
	private $db;
	private $valor;
	
	function __construct($db,$valor)
	{
		$this->db=$db;
		$this->valor=$valor;
	}
	function get_d(){return $this->db;}
	function get_v(){return $this->valor;}
}

class autoconf extends db
{
	private $name;
	private $modulo;
	private $template1;
	private $template2;
	private $template3;
	private $dbv;
	
	function __construct($name,$dbv)
	{
		$this->dbv=$dbv;
		$this->name=$name;
		$this->connect();
		//cria databases
		echo "<b>A criar bases de dados</b></br>";
		$this->add_database();
		//cria routes e adiciona modulos
		echo "<b>A criar modulos</b></br>";
		$this->add_module('get_all','get_one');
		echo "<b>A criar routes</b></br>";
		$this->add_routes($this->name,"templates/".$this->name.".main.php","templates/".$this->name.".edit.php");
		//cria modulos
		echo "<b>A criar Ficheiros</b></br>";
		$this->createFiles();
	}
	
	function add_database()
	{
		$dbv=$this->dbv;
		$data="CREATE TABLE IF NOT EXISTS `".$this->name."`(";
		$data.="`id` int(11) NOT NULL AUTO_INCREMENT,";
		foreach($dbv as $dbv1)
		{
			$data.="`".$dbv1->get_d()."` ".$dbv1->get_v()." NOT NULL,";
		}
		$data.="PRIMARY KEY (`id`)";
		$data.=") ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
		$resultado=$this->set($data);
		if($resultado)
		{
			echo "-base de dados criada com sucesso</br>";
		}
		else
		{
			echo "-erro na criaçao da base de dados</br>";
			echo $data;
		}
	}
	
	function add_module($opt1,$opt2)
	{
		$this->opt1=$opt1;
		$this->opt2=$opt2;
		include('../mrouter/modules.php');
		$modules_autoconf=json_decode($modules_autoconf);
		//adicionar modulos ja existendes
		$data="<?php\n";
		foreach($modules_autoconf as $module_autoconf)
		{
			print_r($module_autoconf);
			$data.="$".$module_autoconf->name."=new module('".$module_autoconf->name."','".$module_autoconf->opt1."','".$module_autoconf->opt2."');\n";
			$data.="$".$module_autoconf->name."_module=array($".$module_autoconf->name.");\n";
		}
		//adicionar o meu modulo
		$data.="$".$this->name."=new module('".$this->name."','".$this->opt1."','".$this->opt2."');\n";
		$data.="$".$this->name."_module=array($".$this->name.");\n";
		
		//criar novo file autoconf
		$novo_auto->name=$this->name;
		$novo_auto->opt1=$this->opt1;
		$novo_auto->opt2=$this->opt2;
		$modules_autoconf[]=$novo_auto;
		$modules_autoconf=json_encode($modules_autoconf);
		$data.="$"."modules_autoconf='".$modules_autoconf."';\n";
		$data.="?>";
		//actualizar no ficheiro
		$handle=fopen('../mrouter/modules.php','w');
		if(fwrite($handle,$data))
		{
			echo "-Modulos inseridos com sucesso<br>";
		}
		else
		{
			echo "-Erro,Verifique permissoes<br>";
		}
	}
	
	function add_routes($modulo,$template1,$template2,$template3)
	{
		$this->modulo=$this->name."_module";
		$this->template1=$template1;
		$this->template2=$template2;
		$this->template3=$template3;
		include('../mrouter/routes.php');
		$routes_autoconf=json_decode($routes_autoconf);
		print_r($routes_autoconf);
		$data="<?php\n";
		$data."$routes=array();";
		//adicionar routes ja existentes
		foreach($routes_autoconf as $route_autoconf)
		{
			$data.="$".$route_autoconf->route."_route"."=new route('".$route_autoconf->route."',".$route_autoconf->module.",'".$route_autoconf->template1."','".$route_autoconf->template2."','".$route_autoconf->template3."');\n";
			$data.="$"."routes[]=$".$route_autoconf->route."_route;\n";
		}
		//adicionar as minhas routes
		$data.="$".$this->name."_route=new route('".$this->name."',\$".$this->modulo.",'".$this->template1."','".$this->template2."','".$this->template3."');\n";
		$data.="$"."routes[]=$".$this->name."_route;\n";
		//criar file autoconfe
		$novo_auto->name=$this->name;
		$novo_auto->template1=$this->template1;
		$novo_auto->template2=$this->template2;
		$novo_auto->template3=$this->template3;
		$routes_autoconf[]=$novo_auto;
		$routes_autoconf=json_encode($routes_autoconf);
		$data.="$"."routes_autoconf='".$routes_autoconf."';\n";
		$data.="?>";
		//actualizar no ficheiro
		$handle=fopen('../mrouter/routes.php','w');
		if(fwrite($handle,$data))
		{
			echo "-Modulos inseridos com sucesso<br>";
		}
		else
		{
			echo "-Erro,Verifique permissoes<br>";
		}
	}
	function create_module()
	{
		//file.module
		$handle=fopen('../modules/'.$this->name.'.php','w');
		$data="<?php\n";
		$data.="include('".$this->name.".class.php');\n";
		$data.="include('".$this->name.".controller.php');\n";
		$data.="?>";
		//echo $data;
		if(fwrite($handle,$data))
		{
			echo "ficheiro adicionado";
		}
		else
		{
			echo "erro na inserçao de ficheiro";
		}
	}
	
	function create_class()
	{
		$dbv=$this->dbv;
		$handle=fopen('../modules/'.$this->name.'.class.php','w');
		$data="<?php\n";
		$data.="class ".$this->name." extends db{\n";
		$data.="function __construct(){\n";
		$data.="\$this->connect();\n";
		$data.="}\n";
		$data.="function get_all(){\n";
		$data.="\$query='SELECT * FROM ".$this->name."';\n";
		$data.="\$data=\$this->get(\$query);\n";
		$data.="return \$data;";	
		$data.="}\n";
		$data.="function get_one(\$id){}\n";
		$data.="function get_filter(\$filter,\$value){}\n";
		$data.="function delete(\$id){}\n";
		$data.="function update(){}\n";
		$data.="}\n";

		$data.="?>";
		if(fwrite($handle,$data))
		{
			echo "ficheiro adicionado";
		}
		else
		{
			echo "erro na inserçao de ficheiro";
		}
	}
	
	function create_controller()
	{
		//file.controller
		$handle=fopen('../modules/'.$this->name.'.controller.php','w');
		$data="<?php\n";
		$data.="$".$this->name."= new ".$this->name."();\n";
		$data.="\$data = $".$this->name."->get_all();\n";
		$data.="";
		$data.="?>";
		echo $data;
		if(fwrite($handle,$data))
		{
			echo "ficheiro adicionado";
		}
		else
		{
			echo "erro na inserçao de ficheiro";
		}
	}
	
	function create_template()
	{
		//file.controller
		$handle=fopen('../templates/'.$this->name.'.main.php','w');
		$data="<?php\n";
		$data.="print_r(\$data);";
		$data.="?>";
		echo $data;
		if(fwrite($handle,$data))
		{
			echo "Template adicionado";
		}
		else
		{
			echo "erro na inserçao de ficheiro";
		}
	}
	
	function createFiles()
	{
		echo "<b>A criar ficheiro class</b></br>";
		$this->create_class();
		echo "<b>A criar ficheiro modulo</b></br>";	
		$this->create_module();
		echo "<b>A criar ficheiro controlador</b></br>";
		$this->create_controller();
		echo "<b>A criar ficheiro Template</b></br>";
		$this->create_template();
	}
	
}
$x=new dbv('user','TEXT');
$y=new dbv('pass','TEXT');
$auto=new autoconf('teste',array($x,$y));





?>
