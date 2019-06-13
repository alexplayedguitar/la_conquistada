<?php
include ('../connect.php');
include ('../model/artista.php');
include ('../model/sql_querys.php');

if(isset($_POST['submit'])){
		$idArtista=$_GET['id'];
		$queries= new Querys();	
		
		$link=connect();
		
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		$data = array('id_artista'=>$idArtista, 'nombre'=>$_POST['nombre'],'apellido'=>$_POST['apellido'], 'id_pais'=>intval($_POST['pais']),
						'apodo'=>$_POST['apodo'],'biografia'=>$_POST['biografia'], 'id_genero'=>intval($_POST['genero']), 'imagen'=>$objFoto);
	
		$artist= new Artista($data);
		$artist->update();
		
		
		$paises= Querys::show_countries();
		$generos= Querys::show_genrers();
		$artists=Querys::show_artists();
		
		
		include('../views/view-artista.php');

	}else{
		$idArtista=$_GET['id'];
		$queries= new Querys();	
		
		$paises= Querys::show_countries();
		$generos= Querys::show_genrers();
		$artista=Artista::get_artist($idArtista);
		$edit_gender=Querys::get_genero($artista->id_genero);
		$edit_country=Querys::get_pais($artista->id_pais);
		
		include('../views/view-edit-artista.php');
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
