<?php
include ('../connect.php');
include ('../model/noticia.php');
include ('../model/sql_querys.php');


if (isset($_POST['submit'])){
	
		$id=intval($_GET['id_noticia']);
		$title= $_POST['titulo'];
		$description= $_POST['descripcion'];
		
		$data = array('id_noticia'=>$id, 'titulo'=>$title, 'descripcion'=>$description, 'fecha'=>04-06-2019);
		//$noticia=Noticia::get_noticia($id);
		
		//$noticia->$titulo=$title;
		
		$new = new Noticia($data);
		
		$new->update();
		
		$noticias=Noticia::get_all_noticia();
		include('../views/view-news.php');
		//$noticia->titulo=$title;
		//$noticia->descripcion=$description;

		/*$noticia->id_noticia=$id;
		$noticia->titulo=$title;
		$noticia->descripcion=$description;*/

		//$query_noticias= new Querys();
		//$show_noticias=$query_noticias->show_news();

}else{
	$id=intval($_GET['id_noticia']);
	$news=Noticia::get_noticia($id);
	

	include('../views/view-edit-news.php');
	
	
	
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