<?php
class MostrarArtista{
		
     var $id_artista;
     var $nombre;
	 var $apellido;
	 var $nombre_pais;
	 var $apodo;
	 var $nombre_genero;
	 var $imagen;

    function __construct($data) {
		$this->id_artista= $data['id_artista'];
        $this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->nombre_pais = $data['nombre_pais'];
		$this->apodo = $data['apodo'];
		$this->nombre_genero = $data['nombre_genero'];
		$this->imagen= $data['imagen'];
    }//el constructor puede mutar a recepcion de mas de una info, es la wea con cajitas $data['name']
	

}
?>
