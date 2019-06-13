<?php

include ('../connect.php');
include ('../model/noticia.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
		$title= $_POST['titulo'];
		$description= $_POST['descripcion'];
		$fecha=getdate();
		
		$data = array('titulo'=>$title,'descripcion'=>$description,'fecha'=>$fecha);
		$noticia= new Noticia($data);
		
		$noticia->save();
		$noticias=Noticia::get_all_noticia();
		//$query_noticias= new Querys();
		//$show_noticias=$query_noticias->show_news();
	include('../views/view-news.php');
}else{
	$query_noticias= new Querys();
	$noticias=Querys::show_news();
	include('../views/view-news.php');
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
