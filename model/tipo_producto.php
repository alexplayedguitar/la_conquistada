<?php

class TipoProducto{
    var $id_tipoProducto;
	var $nombre;


   function __construct($data) {
		$this->id_tipoProducto= $data['id_tipoProducto'];
		$this->nombre = $data['nombre'];
   }
   function save(){
       $sql = "INSERT INTO tipoproducto (nombre) VALUES ('".$this->nombre."')";
       $link = connect();
       if ($link->query($sql) === TRUE) {
           $id_tipoProducto = mysqli_insert_id($link);
           $this->id_tipoProducto = $id_tipoProducto;
           return $this;
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
           return false;
       }

   }
	//Borrar un dato que se crea automáticamente
	function delete(){
	$sql="DELETE FROM tipoproducto where id_tipoProducto =".$id_tipoProducto.";";
	$link=connect(); //nos conectamos a la base	
	mysql_query($link,$sql);

	}
	function update(){
	$sql="UPDATE tipoproducto SET nombre='".$this->nombre."' WHERE id_tipoProducto='".$id_tipoProducto."';";
	$link=connect();
	mysqli_query($link, $sql);
	}
	static function get_all_type(){
        $query = "SELECT * FROM tipoproducto;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $type = new TipoProducto($row);
            array_push($type, $notice);
        }

        return $resp;
    }

    static function get_tipo_producto($id_tipoProducto){
        $query = "SELECT * FROM tipoproducto WHERE id_tipoProducto='".$id_tipoProducto."';";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $type = new TipoProducto($row);
            array_push($resp, $type);
        }
        return $resp[0];
    }

    static function delete_all_noticias(){
        $type = TipoProducto::get_all_type();
        for($i=0; $i<count($type); $i++){
            $tipo = $type[$i];
            $tipo->delete();
        }
    }
}
?>


