<?php
$_route=new route('',,'templates/teste.tmp1.php','templates/teste.tmp2.php','templates/testetmp3.php');
$routes[]=$_route;
$teste_route=new route('teste',$teste_module,'templates/teste.main.php','templates/teste.edit.php','');
$routes[]=$teste_route;
$routes_autoconf='[{"name":"teste","template1":"templates\/teste.tmp1.php","template2":"templates\/teste.tmp2.php","template3":"templates\/testetmp3.php"},{"name":"teste","template1":"templates\/teste.main.php","template2":"templates\/teste.edit.php","template3":null}]';
?>