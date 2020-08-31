<?php  
  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Compras
  require_once("../modelos/Compras.php");
  $compras = new Compras(); 

  switch($_GET["op"]){
  	case "get_numero_compra":
    $datos= $compras->get_numero_compras();
    $suc_rec=$_POST["sucursal_correlativo"];  		
    $correlativo=substr($suc_rec, 0,2);
    // si existe el proveedor entonces recorre el array
	    if(is_array($datos)==true and count($datos)>0){
		    foreach($datos as $row){
			  $num_recibo=substr($row["numero_compra"],3,11)+1;					
			  $output["num_recibo"] = strtoupper($correlativo).'-'.$num_recibo;								
		  }
	 echo json_encode($output);
		}
  break;


    case "buscar_aros_id":

      $datos=$compras->get_lente_por_id($_POST["id_producto"]);

        if(is_array($datos)==true and count($datos)>0){

        foreach($datos as $row)
        {
          $output["id_producto"] = $row["id_producto"];
          $output["medidas"] = $row["medidas"];
          $output["modelo"] = $row["modelo"];
          $output["marca"] = $row["marca"];
          $output["color"] = $row["color"];
          $output["categoria"] = $row["categoria"];                   
        }      

      } else {                 
                 //si no existe el registro entonces no recorre el array
          $output["error"]="El producto seleccionado está inactivo, intenta con otro";

      }

  echo json_encode($output);

break;

case "registrar_compra";

  $datos=$compras->valida_existencia_ncompra($_POST["n_compra"]);

  if(is_array($datos)==true and count($datos)==0){
    $compras->agrega_detalle_compra();
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

///GET COMPRAS ESTADO CERO PARA INGRESOS A BODEGA
case 'compras_ingreso':
  $datos=$compras->get_compras_ingresar();
    //Vamos a declarar un array
  $data= Array();
    foreach($datos as $row)
  {
    $sub_array = array();       
    $sub_array[] = $row["id_compra"];
    $sub_array[] = $row["fecha_compra"];
    $sub_array[] = $row["numero_compra"];
    $sub_array[] = $row["nombre_proveedor"];
    $sub_array[] = '<a href="distribuir_compra.php?numero_compra='.$row["numero_compra"].'"><button type="button"  class="btn btn-primary btn-md listar_compras_pendientes" id="'.$row["numero_compra"].'" data-toggle="modal" data-target="#modal_ingreso_bodega"><i class="fas fa-cubes"></i> Ingresar a Bodega</button></a>';                                 
    $data[] = $sub_array;
  }

        $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

    break;
/// FN GET COMPRAS ESTADO CERO PARA INGRESOS A BODEGA
}//FIN DEL SWITCH 	