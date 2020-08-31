<?php 
require_once("../config/conexion.php");

class Categoria extends conectar
{//inicio de la clase

	public function registrar_categoria($cat_nombre,$cat_sucursal,$cat_descripcion){

		$conectar= parent::conexion();
		parent::set_names();
		$sql="insert into categoria values(null,?,?,?);";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $cat_nombre);
		$sql->bindValue(2, $cat_sucursal);
		$sql->bindValue(3, $cat_descripcion);
		$sql->execute();

		//print_r($_POST);
	}

	public function get_categorias(){
	    $conectar= parent::conexion();
		parent::set_names();
		 $sql="select id_categoria, nombre from categoria";
		 $sql=$conectar->prepare($sql);
    	 $sql->execute();
    	 return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    	}


	}/////FIN CLASS

 ?>