<?php
session_start();
error_reporting(0);
include("views/include/connect.php");
include("../views/login.php");
//header('Location: ../views/login.php');
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$ret=mysqli_query($link,"SELECT * FROM credenciales WHERE usuario='$username' and clave='$password'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
	$extra="views/welcome.php";//
	$_SESSION['alogin']=$_POST['username'];
	$_SESSION['id']=$num['id'];
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
	}
	else
	{
	$_SESSION['errmsg']="Invalid username or password";
	$extra="views/welcome.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
	}
	}
?>