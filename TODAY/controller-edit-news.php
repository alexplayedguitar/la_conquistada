<?php
include ('../connect.php');
include ('../model/noticia.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
	
		$id=intval($_GET['id_noticia']);
		$link=connect();
		
		$title= $_POST['titulo'];
		$description= $_POST['descripcion'];
		$fecha=$_POST['fecha'];
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		$data = array('id_noticia'=>$id, 'titulo'=>$title, 'descripcion'=>$description, 'fecha'=>$fecha, 'imagen'=>$objFoto);
		
		$new = new Noticia($data);
		
		$new->update();
		
		$noticias=Noticia::get_all_noticia();
		include('../views/view-news.php');
		

}else{
	if(isset($_GET['del'])){
		$id=intval($_GET['id_noticia']);
		$news=Noticia::get_noticia($id);
		
		link=connect();
		$title= $news->titulo;
		$description= $news->descripcion;
		$fecha=$news->fecha;
		$objFoto=$news->imagen;
		
		$data = array('id_noticia'=>$id, 'titulo'=>$title, 'descripcion'=>$description, 'fecha'=>$fecha, 'imagen'=>$objFoto);
		
		$new = new Noticia($data);
		$new->delete_();
		
		$noticias=Noticia::get_all_noticia();
		include('../views/view-news.php');
		
	}else{
		$id=intval($_GET['id_noticia']);
		$news=Noticia::get_noticia($id);
	
		include('../views/view-edit-news.php');
	
	}
	
}
	
	
	



//session_start();
//include('include/config.php');
//if(strlen($_SESSION['alogin'])==0)
//	{	
//header('location:index.php');
//}
//else{
//date_default_timezone_set('America/Santiago');
//$currentTime = date( 'd-m-Y h:i:s A', time () );
//
//
//if(isset($_POST['submit']))
//{
//	$category=$_POST['category'];
//	$description=$_POST['description'];
//	$id=intval($_GET['id']);
//$sql=mysqli_query($con,"update category set categoryName='$category',categoryDescription='$description',updationDate='$currentTime' where id='$id'");
//$_SESSION['msg']="Category Updated !!";
//}

?>