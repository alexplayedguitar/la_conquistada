<?php
class Genero{
    var $id_genero;
    var $nombre;

    
    function __construct($data) {
        $this->id_genero = $data['id_genero'];
        $this->nombre = $data['nombre'];
		
    }
	
    function save(){
        $sql = "INSERT INTO genero (nombre) VALUES ('".$this->nombre."')";
        $link = connect();
        if ($link->query($sql) === TRUE) {
            $id_genero = mysqli_insert_id($link);
            $this->id_genero = $id_genero;
            return $this;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
	
	function delete_(){
		$sql="DELETE FROM genero WHERE  id_genero =".$this->id_genero." ";
		$link= connect();
		mysqli_query($link, $sql);
	}
	
	function update($id_genero, $nombre){
		$sql="UPDATE genero SET nombre =".$this->nombre." WHERE id_genero=".$this->id_genero."";
		$link=connect();
		mysqli_query($link, $sql);
	}
	
	static function get_all_genero(){
        $query = "SELECT * FROM genero;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $genrer = new Genero($row);
            array_push($resp, $genrer);
        }

        return $resp;
    }

    static function get_genero($id_genero){
        $query = "SELECT * FROM noticia WHERE id_genero=".$id_genero.";";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $genrer = new Genero($row);
            array_push($resp, $genrer);
        }
        return $resp[0];
    }

    static function delete_all_genero(){
        $genrer = Noticia::get_all_noticia();
        for($i=0; $i<count($genrer); $i++){
            $genero = $genrer[$i];
            $genero->delete();
        }
    }	
}
?>



