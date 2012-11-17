<?php
include('mrouter/modules.php');
include('mrouter/routes.php');
	$entrou=false;
	if(isset($rotate))
	{
		$Groutes=$_GET['route'];
		$partes=explode('/',$Groutes);
		$modulo=$partes[0];
		$funcao=$partes[1];
		$funcao2=$partes[2];
	
		foreach($routes as $route)
		{
			$result=$route->getRoute($modulo,$funcao,$funcao2);
			foreach ($result as $res) 
			{
				$entrou=true;
				echo $res.'<br>';
				include($res);
			}
		}
		if($entrou==false)
		{
			route_not_found();
		}	
	}

?>
