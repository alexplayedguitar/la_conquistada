<?php

include ('../connect.php');
include ('../model/persona.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
		$link=connect();
		
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$fechaNac=$_POST['fechaNac'];
		$pais=$_POST['pais'];
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		$data = array('nombre'=>$nombre,'apellido'=>$apellido,'fechaNac'=>$fechaNac,'id_pais'=>$pais,'imagen'=>$objFoto);
		$persona= new Persona($data);
		
		$persona->save();
		$personas=Persona::get_all_people();
		
		$query_noticias= new Querys();
		$paises=Querys::show_countries();

	include('../views/view-person.php');
}else{
	$query_noticias= new Querys();
	$personas=Querys::show_people();
	$paises=Querys::show_countries();

	include('../views/view-person.php');
}

//session_start();
//include('include/config.php');

//if(strlen($_SESSION['alogin'])==0)
//	{	
//header('location: ../views/view-news.php');
//}
//else{
//date_default_timezone_set('America/Santiago');// change according timezone
//$currentTime = date( 'd-m-Y h:i:s A', time () );


//if(isset($_POST['submit']))
//{
//	$category=$_POST['titulo'];
//	$description=$_POST['descripcion'];
//$sql=mysqli_query($con,"insert into noticia(titulo,descripcion) values('$titulo','$descripcion')");
//$_SESSION['msg']="Noticia creada!";
//
//}
//
//if(isset($_GET['del']))
//		  {
//		          mysqli_query($con,"delete from noticia where id_noticia = '".$_GET['id']."'");
//                  $_SESSION['delmsg']="Noticia eliminada!";
//		  }

?>
