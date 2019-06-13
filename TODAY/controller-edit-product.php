<?php
include ('../connect.php');
include ('../model/producto.php');
include ('../model/sql_querys.php');
include ('../model/artista.php');

if (isset($_POST['submit'])){
		$link=connect();
		$idProducto=intval($_GET['idproducto']);
		$id_tipo=intval($_POST['tipo_producto']);
		$id_artista=intval($_POST['artista']);
		$nombre=$_POST['nombre'];
		$sello= $_POST['sello'];
		$fechaLanzamiento=$_POST['fechaLanzamiento'];
		$descripcion=$_POST['descripcion'];
		$precio=intval($_POST['precio']);
		$objFoto=mysqli_real_escape_string($link, file_get_contents($_FILES["imagen"]["tmp_name"]));
		
		
		$data = array('id_producto'=>$idProducto, 'id_tipoProducto'=>$id_tipo,'id_artista'=>$id_artista,'nombre'=>$nombre, 'sello'=>$sello,'fechaLanzamiento'=>$fechaLanzamiento,'descripcion'=>$descripcion, 'precio'=>$precio, 'imagen'=>$objFoto);
		
		$new = new Producto($data);
		
		$new->update();
		
		$query_producto= new Querys();
		
		$tipos=Querys::show_types(); //esto, para cargar la lista de tipos de productos.
		$artistas=Querys::get_id_name_artist(); //esto, para cargar exclusivamente
		$productos=Querys::show_products_artist(); // esto, para devolver el listado de artistas a la vista principal.
	
		
		include('../views/view-product.php');

}else{
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

		include('../views/view-product.php');//esto preguntar mañana al profe.
	
	}else{
		$idProducto=intval($_GET['idproducto']);
		
		$query_producto= new Querys();
		
		$tipos=Querys::show_types(); //esto, para cargar la lista de tipos de productos.
		$artistas=Querys::get_id_name_artist(); //esto, para cargar exclusivamente
		$productos=Querys::show_products_artist(); // esto, para devolver el listado de artistas a la vista principal.
		
		$edit_producto=Producto::get_product($idProducto);//esto, para traer el producto completo.
		$edit_tipo_prod=Querys::get_tipo_producto($edit_producto->id_tipoProducto); //esto ara traer un producto en especifico.
		$edit_artista=Querys::get_person($edit_producto->id_artista); //esto, para traer un artista en especifico.

		include('../views/view-edit-product.php');
		
	}
}
		

//header('Location: ../views/view-edit-product.php');
//session_start();
//include('include/config.php');
//if(strlen($_SESSION['alogin'])==0)
//	{	
//header('location:index.php');
//}
//else{
//date_default_timezone_set('Asia/Kolkata');// change according timezone
//$currentTime = date( 'd-m-Y h:i:s A', time () );
//
//if(isset($_GET['del']))
//		  {
//		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
//                  $_SESSION['delmsg']="Product deleted !!";
//		  }
?>