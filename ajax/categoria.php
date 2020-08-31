<?php
require_once("../config/conexion.php");
// llamada al modelo categoria
require_once("../modelos/categoria.php");

$categorias = new Categoria();

switch ($_GET["op"]){
	case 'guardar_categoria':
	$categorias->registrar_categoria($_POST["cat_nombre"],$_POST["cat_sucursal"],$_POST["cat_descripcion"]);
		break;
}
 ?>