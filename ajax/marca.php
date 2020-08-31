<?php
require_once("../config/conexion.php");
//llamada al modelo marca
require_once("../modelos/marca.php");

$marca = new Marca();

switch ($_GET["op"]) {
	case 'guardar_marca':
	   $marca->registrar_marca($_POST["nom_marca"]);
    break;
}
