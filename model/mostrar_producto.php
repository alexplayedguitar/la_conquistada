<?php
class MostrarProducto{
		
     var $id_producto;
     var $nombre;
	 var $sello;
	 var $fechaLanzamiento;
	 var $artista;
	 var $id_tipoProducto;
	 var $tipo_producto;
	 var $precio;
	 var $imagen;

    function __construct($data) {
		$this->id_producto= $data['id_producto'];
        $this->nombre = $data['nombre'];
		$this->sello = $data['sello'];
		$this->fechaLanzamiento = $data['fechaLanzamiento'];
		$this->artista = $data['artista'];
		$this->id_tipoProducto = $data['id_tipoProducto'];
		$this->tipo_producto = $data['tipo_producto'];
		$this->precio = $data['precio'];
		$this->imagen = $data['imagen'];
    }//el constructor puede mutar a recepcion de mas de una info, es la wea con cajitas $data['name']
	

}
?>
