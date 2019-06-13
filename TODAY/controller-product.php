<?php
include ('../connect.php');
include ('../model/artista.php');
include ('../model/sql_querys.php');
include ('../model/producto.php');

if (isset($_POST['submit'])){ //ordenar
		$query_producto= new Querys();
		$link=connect();
		$id_tipo=intval($_POST['tipo_producto']);
		$id_artista=intval($_POST['artista']);
		$nombre=$_POST['nombre'];
		$sello= $_POST['sello'];
		$fechaLanzamiento=$_POST['fechaLanzamiento'];
		$descripcion=$_POST['descripcion'];
		$precio=intval($_POST['precio']);
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		$data = array('id_tipoProducto'=>$id_tipo,'id_artista'=>$id_artista,'nombre'=>$nombre, 'sello'=>$sello,'fechaLanzamiento'=>$fechaLanzamiento,'descripcion'=>$descripcion, 'precio'=>$precio, 'imagen'=>$objFoto);
		$producto= new Producto($data);
		
		$producto->save();

		$tipos=Querys::show_types();
		$artistas=Querys::get_id_name_artist();
		$productos=Querys::show_products_artist();

	include('../views/view-product.php');
}else{
	$query_producto= new Querys();
	$tipos=Querys::show_types();
	$artistas=Querys::get_id_name_artist();
	$productos=Querys::show_products_artist();

	include('../views/view-product.php');
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
