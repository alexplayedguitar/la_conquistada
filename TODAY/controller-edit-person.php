<?php

include ('../connect.php');
include ('../model/persona.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
		$id=intval($_GET['id_persona']);
		$link=connect();
		
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$fechaNac=$_POST['fechaNac'];
		$pais=$_POST['pais'];
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		$data = array('nombre'=>$nombre,'apellido'=>$apellido,'fechaNac'=>$fechaNac,'id_pais'=>$pais,'imagen'=>$objFoto);
		$persona= new Persona($data);
		
		$persona->update();
		$noticias=Persona::get_all_people();
		
		$query_noticias= new Querys();
		$paises=Querys::show_countries();

	include('../views/view-person.php');
} 
else{
	if(isset($_GET['del'])){
		$query_noticias= new Querys();
		$id=intval($_GET['id_persona']);
		$edit_person=Persona::get_person($id);
		
		$nombre= $edit_person->nombre;
		$apellido= $edit_person->apellido;
		$fechaNac=$edit_person->id_pais;
		$objFoto=$edit_person->imagen;
		
		$data = array('nombre'=>$nombre,'apellido'=>$apellido,'fechaNac'=>$fechaNac,'id_pais'=>$pais,'imagen'=>$objFoto);
		$persona= new Persona($data);
		
		$persona->delete_();
		$noticias=Persona::get_all_people();
		$paises=Querys::show_countries();
		include('../views/view-person.php');
	}
	else{
		$id=intval($_GET['id_persona']);
	
		$query_noticias= new Querys();
		$edit_person=Persona::get_person($id);
		$edit_pais=Querys::get_pais($edit_person->id_pais);
	
		$paies=Querys::show_countries();
		include('../views/view-edit-person.php');
	}
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
