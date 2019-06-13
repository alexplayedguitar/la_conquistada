<?php
class Noticia{
    var $id_noticia;
	var $titulo;
    var $descripcion;
	var $fecha;
	var $imagen;
	
	/*function __construct($titulo, $descripcion, $fecha){
		$this->titulo=$titulo;
		$this->descripcion=$descripcion;
		$this->fecha=$fecha;
	}*/
	
    function __construct($data) {
		$this->id_noticia= $data['id_noticia'];
		$this->titulo = $data['titulo'];
		$this->descripcion = $data['descripcion'];
		$this->fecha= $data['fecha'];
		$this->imagen= $data['imagen'];

    }
	
    function save(){
        $sql = "INSERT INTO noticia (titulo, descripcion, fecha) VALUES ('".$this->titulo."','".$this->descripcion."','".$this->fecha."','".$this->imagen."');";
        $link = connect();
        if ($link->query($sql) === TRUE) {
            $id_noticia = mysqli_insert_id($link);
            $this->id_noticia = $id_noticia;
            return $this;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
	
	function delete_(){
		$sql="DELETE FROM noticia WHERE  id_noticia =".$this->id_noticia." ;";
		$link= connect();
		mysqli_query($link, $sql);
	}
	
	
	function update(){
		$sql="UPDATE noticia SET titulo ='".$this->titulo."' , descripcion='".$this->descripcion."', imagen='".$this->imagen."' WHERE id_noticia='".$this->id_noticia."';";
		$link=connect();
		mysqli_query($link, $sql);
	}
	
	static function get_all_noticia(){
        $query = "SELECT * FROM noticia;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $notice = new Noticia($row);
            array_push($resp, $notice);
        }

        return $resp;
    }

    static function get_noticia($id_noticia){
        $query = "SELECT * FROM noticia WHERE id_noticia=".$id_noticia.";";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $notice = new Noticia($row);
            array_push($resp, $notice);
        }
        return $resp[0];
    }

    static function delete_all_noticias(){
        $notice = Noticia::get_all_noticia();
        for($i=0; $i<count($notice); $i++){
            $noticia = $notice[$i];
            $noticia->delete();
        }
    }
}
?>


