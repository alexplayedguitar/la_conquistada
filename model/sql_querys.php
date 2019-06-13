<?php
include ('../model/genero.php');
include ('../model/pais.php');
include ('../model/mostrar_artista.php');
include ('../model/mostrar_producto.php');
include ('../model/tipo_producto.php');
class Querys{
	
	function __construct(){
		
	}
	
	//Querys Paises
	
	function show_countries(){
        $query = "SELECT * FROM pais;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $genrer = new Pais($row);
            array_push($resp, $genrer);
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
	
	//Querys por género musical
	
	function show_genrers(){
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
        $query = "SELECT * FROM genero WHERE id_genero=".$id_genero.";";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $genrer = new Genero($row);
            array_push($resp, $genrer);
        }
        return $resp[0];
    }
	
	//Queries Artistas
	
	function show_artists(){//funcion para tabla artista
		$query="SELECT a.id_artista, a.nombre , a.apellido, p.nombre AS 'nombre_pais', a.apodo, ge.nombre AS 'nombre_genero', a.imagen 
				  FROM pais p JOIN artista a 
				  ON p.id_pais = a. id_pais 
				  JOIN genero ge ON a.id_genero = ge.id_genero;";
		//$query = "SELECT * from artista;";
		/*$query="SELECT a.id_artista, a.nombre , a.apellido, p.nombre, a.apodo, a.biografia, ge.nombre 
				  FROM pais p JOIN artista a 
				  ON p.id_pais = a. id_pais 
				  JOIN genero ge ON a.id_genero = ge.id_genero;";*/
				  
       /*$query = "SELECT a.id_artista, a.nombre , a.apellido, p.nombre, a.apodo, a.biografia, ge.nombre 
				  FROM artista a JOIN pais p 
				  ON a.id_pais = p. id_pais 
				  JOIN genero ge ON a.id_genero = ge.id_genero;";*/
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $artist = new MostrarArtista($row);
            array_push($resp, $artist);
        }

        return $resp;
    }
	
	static function get_id_name_artist(){ //para formularios
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
	
	
	//Queries Noticias
	static function show_news(){
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
        $query = "SELECT titulo, descripcion FROM noticia WHERE id_noticia=".$id_noticia.";";
        $link = connect();
        $result = $link->query($query);
        //$resp = array();

        //while($row = $result->fetch_assoc()) {
        //    $notice = new Noticia($row);
        //    array_push($resp, $notice);
        //}
        return $result;
    }
	
	//Persona
	static function show_people(){
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
	
	
	//Tipo Producto
	static function show_types(){
        $query = "SELECT * FROM tipoproducto;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $type = new TipoProducto($row);
            array_push($resp, $type);
        }

        return $resp;
    }
	
	//Producto
	
	static function show_products(){
        $query = "SELECT * FROM producto;";
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $prod = new Producto($row);
            array_push($resp, $prod);
        }

        return $resp;
    }
	function show_products_artist(){//funcion para tabla artista
		$query="SELECT pp.id_producto, pp.nombre , pp.sello, pp.fechaLanzamiento, a.apodo AS 'artista', tp.id_tipoProducto, tp.nombre AS 'tipo_producto', pp.precio, pp.imagen 
				  FROM producto pp JOIN artista a
				  ON a.id_artista = pp.id_artista 
				  JOIN tipoproducto tp ON pp.id_tipoProducto = tp.id_tipoProducto;";
		//$query = "SELECT * from artista;";
		/*$query="SELECT a.id_artista, a.nombre , a.apellido, p.nombre, a.apodo, a.biografia, ge.nombre 
				  FROM pais p JOIN artista a 
				  ON p.id_pais = a. id_pais 
				  JOIN genero ge ON a.id_genero = ge.id_genero;";*/
				  
       /*$query = "SELECT a.id_artista, a.nombre , a.apellido, p.nombre, a.apodo, a.biografia, ge.nombre 
				  FROM artista a JOIN pais p 
				  ON a.id_pais = p. id_pais 
				  JOIN genero ge ON a.id_genero = ge.id_genero;";*/
        $link = connect();
        $result = $link->query($query);
        $resp = array();

        while($row = $result->fetch_assoc()) {
            $product = new MostrarProducto($row);
            array_push($resp, $product);
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
	
	 static function get_person($id_artista){
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
	static function get_max_id_products(){
		$sql="SELECT MAX(id_producto) as 'idProducto' from producto;";
		$link=connect();
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		return $result;
	}
	
	static function get_max_id_artista(){
		$sql="SELECT MAX(id_artista) as 'idArtista' from artista;";
		$link=connect();
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		return $result;
	}
}

?>
