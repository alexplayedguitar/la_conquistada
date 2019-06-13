<?php
class Artista{
		
     var $id_artista;
     var $nombre;
	 var $apellido;
	 var $id_pais;
	 var $apodo;
	 var $biografia;
	 var $id_genero;
	 var $imagen;

    function __construct($data) {
		$this->id_artista= $data['id_artista'];
        $this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->id_pais = $data['id_pais'];
		$this->apodo = $data['apodo'];
		$this->biografia = $data['biografia'];
		$this->id_genero = $data['id_genero'];
		$this->imagen= $data['imagen'];
    }//el constructor puede mutar a recepcion de mas de una info, es la wea con cajitas $data['name']
	
    function save(){
        $sql = "INSERT INTO artista (nombre, apellido, id_pais, apodo, biografia, id_genero, imagen) VALUES ('".$this->nombre."','".$this->apellido."','".$this->id_pais."','".$this->apodo."','".$this->biografia."','".$this->id_genero."', '".$this->imagen."');";
        $link = connect();
        if ($link->query($sql) === TRUE) {
            $id_artista = mysqli_insert_id($link);
            $this->id_artista = $id_artista;
            return $this;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
	
	function delete_(){
		$sql="DELETE FROM artista WHERE  id_artista =".$this->id_artista." ";
		$link= connect();
		mysqli_query($link, $sql);
	}
	
	function update(){
		$sql="UPDATE artista SET nombre ='".$this->nombre."', apellido='".$this->apellido."', id_pais ='".$this->id_pais."', apodo ='".$this->apodo."', biografia ='".$this->biografia."', id_genero ='".$this->id_genero."', imagen ='".$this->imagen."' WHERE id_artista='".$this->id_artista."';";
		$link=connect();
		mysqli_query($link, $sql);
	}
	

	static function get_all_artista(){
        $query = "SELECT * FROM artista;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $artist = new Artista($row);
            array_push($resp, $artist);
        }

        return $resp;
    }

    static function get_artist($id_artista){
        $query = "SELECT * FROM artista WHERE id_artista='".$id_artista."';";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $artist = new Artista($row);
            array_push($resp, $artist);
        }
        return $resp[0];
    }

    static function delete_all_persons(){
        $artist = Artista::get_all_persons();
        for($i=0; $i<count($artist); $i++){
            $artista = $artist[$i];
            $artista->delete();
        }
    }
}
?>
