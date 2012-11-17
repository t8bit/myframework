<?php
session_start();
$rotate=$_GET['route'];
if(!isset($rotate)){$rotate='';}

include('settings.php');
include('core/core.php');
include('router.php');
?>

