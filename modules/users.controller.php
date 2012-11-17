<?php
$username=$_POST['username'];
$password=$_POST['password'];

if($modulo=='logout')
{
	unset($_SESSION);
}
$users=new users();

if($password!='' || $username!='')
{
	$_SESSION['login']=$users->login($username,$password);
	$_SESSION['username']=$username;
}
if($_SESSION['login']==true)
{
	header('Location:index.php?route=passatempos') ;
}
?>
