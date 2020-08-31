<?php 
require_once("config/conexion.php");

class Externos extends conectar
{//inicio de la clase



	public function get_categorias(){
	    $conectar= parent::conexion();
		parent::set_names();
		 $sql="select id_categoria, nombre from categoria";
		 $sql=$conectar->prepare($sql);
    	 $sql->execute();
    	 return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    	}
    	
	public function get_marca(){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="select id_marca, marca from marca";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	}/////FIN CLASS

 ?>