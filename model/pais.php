<?php
class Pais{
   var $id_pais;
   var $nombre;

   
   function __construct($data) {
	   $this->id_pais= $data['id_pais'];
       $this->nombre = $data['nombre'];

   }
   function save(){
       $sql = "INSERT INTO pais (nombre) VALUES ('".$this->nombre."')";
       $link = connect();
       if ($link->query($sql) === TRUE) {
           $id_pais = mysqli_insert_id($link);
           $this->id_pais = $id_pais;
           return $this;
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
           return false;
       }
   }
	function delete_(){
	$sql="DELETE FROM pais WHERE id_pais =".$id_pais." ";
	$link= connect();
	mysqli_query($link, $sql);
	}

	function update($id_pais, $nombre){
	$sql="UPDATE pais SET nombre =".$nombre." WHERE id_pais=".$id_pais."";
	$link=connect();
	mysqli_query($link, $sql);
	}
	
	static function get_all_pais(){
        $query = "SELECT * FROM pais;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $country = new Pais($row);
            array_push($resp, $country);
        }

        return $resp;
    }

    static function get_pais($id_pais){
        $query = "SELECT * FROM pais WHERE id_pais=".$id_pais.";";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $pais = new Pais($row);
            array_push($resp, $pais);
        }
        return $resp[0];
    }

    static function delete_all_paises(){
        $paises = Pais::get_all_pais();
        for($i=0; $i<count($paises); $i++){
            $pais = $paises[$i];
            $pais->delete();
        }
    }
}
?>

