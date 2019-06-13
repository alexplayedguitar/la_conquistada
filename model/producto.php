<?php
class Producto{
	var $id_producto;
	var $id_tipoProducto;
	var $id_artista;
	var $nombre;
	var $sello;
	var $fechaLanzamiento;
	var $descripcion;
	var $precio;
	var $imagen;

	function __construct($data) {
		$this->id_producto = $data['id_producto'];
		$this->id_tipoProducto = $data['id_tipoProducto'];
		$this->id_artista = $data['id_artista'];
		$this->nombre=$data['nombre'];
		$this->sello = $data['sello'];
		$this->fechaLanzamiento = $data['fechaLanzamiento'];
		$this->descripcion = $data['descripcion'];
		$this->precio = $data['precio'];
		$this->imagen= $data['imagen'];
	   }

	function save(){
       $sql = "INSERT INTO producto (id_tipoProducto, id_artista, nombre, sello, fechaLanzamiento, descripcion, precio, imagen) VALUES ('".$this->id_tipoProducto."', '".$this->id_artista."','".$this->nombre."', '".$this->sello."', '".$this->fechaLanzamiento."', '".$this->descripcion."','".$this->precio."','".$this->imagen."');";
       $link = connect();
       if ($link->query($sql) === TRUE) {
           $id_producto = mysqli_insert_id($link);
           $this->id_producto = $id_producto; //con esto, inserto desde la base el ID. yas queen
           return $this;
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
           return false;
       }
   }
		//Borrar un dato que se crea automáticamente
		function delete_(){
		$sql="DELETE FROM producto where id_producto ='".$this->id_producto."';";
		$link=connect(); //nos conectamos a la base	
		mysqli_query($link,$sql);

		}
		function update(){
			$sql="UPDATE producto SET id_tipoProducto ='".$this->id_tipoProducto."',id_artista='".$this->id_artista."', nombre='".$this->nombre."', sello='".$this->sello."', fechaLanzamiento='".$this->fechaLanzamiento."', descripcion='".$this->descripcion."', precio='".$this->precio."', imagen='".$this->imagen."' WHERE id_producto='".$this->id_producto."';";
			$link=connect();
			mysqli_query($link, $sql);
		}

		static function get_all_productos(){
        $query = "SELECT * FROM producto;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $product = new Producto($row);
            array_push($resp, $product);
        }

        return $resp;
    }

    static function get_product($id_producto){
        $query = "SELECT * FROM producto WHERE id_producto=".$id_producto.";";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $product = new Producto($row);
            array_push($resp, $product);
        }
        return $resp[0];
    }

    static function delete_all_products(){
        $product = Producto::get_all_productos();
        for($i=0; $i<count($product); $i++){
            $produc = $product[$i];
            $produc->delete();
        }
    }
}
?>
