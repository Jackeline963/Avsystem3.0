<?php

	  //llamo a la conexion de la base de datos
     require_once("../config/conexion.php");
     //llamo al modelo pacientes
     require_once("../modelos/Productos.php");
      //llamo al modelo Ventas
     $productos = new productos();

    switch($_GET["op"]){

    case "guardar_aros":
    $datos = $productos->valida_existencia_aros($_POST["marca_aros"],$_POST["modelo_aro"],$_POST["color_aro"],$_POST["medidas_aro"]);
		if(is_array($datos)==true and count($datos)==0){
		    $productos->registrar_aro($_POST["marca_aros"],$_POST["modelo_aro"],$_POST["color_aro"],$_POST["medidas_aro"],$_POST["diseno_aro"],$_POST["materiales_aro"],$_POST["cat_venta_aros"],$_POST["categoria_producto"]);
        $messages[]="ok";
    }else{
      $errors[]="error";
    }

    if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
 }
    //mensaje error
      if (isset($errors)){

   ?>

         <?php
           foreach ($errors as $error) {
               echo json_encode($error);
             }
           ?>
   <?php
   }
//fin mensaje error
break;

    case "listar_aros":
    $datos=$productos->get_aros();
    //Vamos a declarar un array
    $data= Array();

    foreach($datos as $row)
      {
        $sub_array = array();

        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["color"];
        $sub_array[] = $row["medidas"];
        $sub_array[] = '<button type="button" class="btn btn-dark agrega_aro"  style="border-radius:0px" onClick="agregar_aro('.$row["id_producto"].')">Seleccionar</button>';
        $data[] = $sub_array;
      }

      $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
      echo json_encode($results);

    break;

    ////////////////LISTAR AROS CREADOS
    case "listar_aros_creados":
    $datos=$productos->get_aros();
    //Vamos a declarar un array
    $data= Array();

    foreach($datos as $row)
      {
        $sub_array = array();
        $descripcion= $row["marca"]." Mod.: ".$row["modelo"]." Med.: ".$row["medidas"]." ".$row["color"];
        $sub_array[] = $row["id_producto"];
        $sub_array[] = $descripcion;
        $sub_array[] = $row["diseno"];
        $sub_array[] = $row["materiales"];
        $sub_array[] = $row["categoria"];
        //$sub_array[] = '<button type="button" class="btn btn-dark agrega_aro"  style="border-radius:0px" onClick="agregar_aro('.$row["id_producto"].')">Seleccionar</button>';
        $data[] = $sub_array;
      }

      $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
      echo json_encode($results);

    break;


   }
   ?>
