<?php

include ('../connect.php');
include ('../model/persona.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$fechaNac=$_POST['fecha'];
		$pais=$_POST['pais'];
		
		$data = array('nombre'=>$nombre,'apellido'=>$apellido,'fecha'=>$fecha,'id_pais'=>$pais);
		$persona= new Persona($data);
		
		$persona->save();
		$noticias=Persona::get_all_people();
		
		$query_noticias= new Querys();
		$paises=Querys::show_countries();

	include('../views/view-person.php');
}else{
	$query_noticias= new Querys();
	$noticias=Querys::show_people();
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
