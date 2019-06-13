<?php
include ('../connect.php');
include ('../model/artista.php');
include ('../model/sql_querys.php');
include ('../model/producto.php');

if (isset($_POST['submit'])){ //ordenar
		$query_producto= new Querys();
		
		$id_tipo=intval($_POST['tipo_producto']);
		$id_artista=intval($_POST['artista']);
		$nombre=$_POST['nombre'];
		$sello= $_POST['sello'];
		$fechaLanzamiento=$_POST['fechaLanzamiento'];
		$descripcion=$_POST['descripcion'];
		$precio=intval($_POST['precio']);
		$foto=$_FILES["imagen"]["name"];
		
		$result=Querys::get_max_id_products();
		$productid=$result['idProducto']+1;
		
		$dir="../caratulas/$productid";
		mkdir($dir);
		move_uploaded_file($_FILES["imagen"]["tmp_name"],"../caratulas/$productid/".$_FILES["imagen"]["name"]);
		
		$data = array('id_tipoProducto'=>$id_tipo,'id_artista'=>$id_artista,'nombre'=>$nombre, 'sello'=>$sello,'fechaLanzamiento'=>$fechaLanzamiento,'descripcion'=>$descripcion, 'precio'=>$precio, 'imagen'=>$foto);
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

if(isset($_GET['del'])){
	
	$idProducto=intval($_GET['idproducto']);
	$del_prod=Producto::get_product($idProducto);
	
		$id_tipo=intval($del_prod->id_tipoProducto);
		$id_artista=intval($del_prod->id_artista);
		$nombre=$del_prod->nombre;
		$sello= $del_prod->sello;
		$fechaLanzamiento=$del_prod->fechaLanzamiento;
		$descripcion=$del_prod->descripcion;
		$precio=intval($del_prod->precio);
		$foto=$del_prod->imagen;
		
		$data2 = array('id_producto'=>$idProducto, 'id_tipoProducto'=>$id_tipo,'id_artista'=>$id_artista,'nombre'=>$nombre, 'sello'=>$sello,'fechaLanzamiento'=>$fechaLanzamiento,'descripcion'=>$descripcion, 'precio'=>$precio, 'imagen'=>$foto);
		$producto= new Producto($data2);
		
		$producto->delete_();
		
		$tipos=Querys::show_types();
		$artistas=Querys::get_id_name_artist();
		$productos=Querys::show_products_artist();

	require_once('../views/view-product.php');//esto preguntar mañana al profe.
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
