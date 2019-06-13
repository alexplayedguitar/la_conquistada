<?php
class Persona{
	
	var $id_persona;
	var $nombre;
	var $apellido;
	var $fechaNac;
	var $id_pais;
	var $imagen;
	//var $id_usuario;
   
   function __construct($data) {
		$this->id_persona= $data['id_persona'];
        $this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->fechaNac = $data['fechaNac'];
		$this->id_pais = $data['id_pais'];
		$this->imagen =$data['imagen'];
		
//$this->id_usuario;
   }
   
      function save(){
        $sql = "INSERT INTO persona (nombre, apellido, fechaNac, id_pais, imagen) VALUES ('".$this->nombre."','".$this->apellido."','".$this->fechaNac."','".$this->id_pais."','".$this->imagen."');";
        $link = connect();
        if ($link->query($sql) === TRUE) {
            $id_persona = mysqli_insert_id($link);
            $this->id_persona = $id_persona;
            return $this;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

			
		//Borrar un dato que se crea automáticamente
		function delete_(){
		$sql="DELETE FROM persona where id_persona ='".$id_persona."';";
		$link=connect(); //nos conectamos a la base	
		mysqli_query($link,$sql);

		}
		function update(){
		$sql="UPDATE persona SET nombre ='".$this->nombre."','".$this->apellido."', '".$this->fechaNac."', '".$this->id_pais."', '".$this->imagen."' WHERE id_persona='".$id_persona."';";
		$link=connect();
		mysqli_query($link, $sql);
		}

	static function get_all_people(){
        $query = "SELECT * FROM persona;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $person = new Persona($row);
            array_push($resp, $person);
        }

        return $resp;
    }

    static function get_person($id_artista){
        $query = "SELECT * FROM persona WHERE id_persona='".$id_persona."';";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $person = new Persona($row);
            array_push($resp, $person);
        }
        return $resp[0];
    }

    static function delete_all_persons(){
        $person = Artista::get_all_persons();
        for($i=0; $i<count($person); $i++){
            $persona = $person[$i];
            $persona->delete();
        }
	}
}
?>

