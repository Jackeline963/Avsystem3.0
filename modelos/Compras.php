<?php
//conexion a la base de datos
require_once("../config/conexion.php");

class Compras extends Conectar{
    
  	public function get_numero_compras(){
    	$conectar= parent::conexion();
    	$sql= "select numero_compra from compras order by id_compra DESC limit 1;";
    	$sql=$conectar->prepare($sql);
    	//$sql->bindValue(1, $sucursal_correlativo);
    	$sql->execute();
    	return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_lente_por_id($id_producto){

        $conectar= parent::conexion();

        $sql="select*from productos where id_producto=? and categoria_producto='aros';";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }
///////////////VERIFICA SI EXISTE COMPRA***********
public function valida_existencia_ncompra($n_compra){
  $conectar= parent::conexion();
  parent::set_names();
  $sql="select*from compras where numero_compra=?";
  $sql= $conectar->prepare($sql);
  $sql->bindValue(1, $n_compra);
  $sql->execute();
  return $resultado=$sql->fetchAll();
}
///////////////FIN VERIFICACION SI EXISTE LA COMPRA

////////////////////CLASE REGISTRA COMPRAS

public function agrega_detalle_compra(){

    $str = '';
    $detalles = array();
    $detalles = json_decode($_POST['arrayCompra']);

    $conectar=parent::conexion();

    foreach ($detalles as $k => $v) {

        $codProd = $v->codProd;
        $modelo = $v->modelo;
        $cantidad = $v->cantidad;
        $marca = $v->marca;
        $color = $v->color;
        $medidas = $v->medidas;
        $precio_compra =$v->precio_compra;
        $precio_venta =$v->precio_venta;
        $subtotal = $v->subtotal;

        $descripcion = $marca." ".$modelo." ".$color." ".$medidas;
        $estado ='Pendiente';
        $n_compra = $_POST["n_compra"];
        $proveedor_compra = $_POST["proveedor_compra"];
        $codigo_proveedor = $_POST["codigo_proveedor"];
        $tipo_compra = $_POST["tipo_compra"];
        $tipo_pago = $_POST["tipo_pago"];
        $plazo = $_POST["plazo"];
        $sucursal = $_POST["sucursal"];
        $tipo_documento = $_POST["tipo_documento"];
        $documento = $_POST["documento"];
        $usuario = $_POST["usuario"];
        $fecha = $_POST["fecha"];
        $total_compra = $_POST["total_compra"];
        $estado ="0";

    $sql="insert into detalle_compras values(null,?,?,?,?,?,?,?,?,?,?,?);";
    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$n_compra);
    $sql->bindValue(2,$descripcion);
    $sql->bindValue(3,$cantidad);
    $sql->bindValue(4,$precio_compra);
    $sql->bindValue(5,$precio_venta);
    $sql->bindValue(6,$subtotal);
    $sql->bindValue(7,$estado);
    $sql->bindValue(8,$usuario);
    $sql->bindValue(9,$codProd);
    $sql->bindValue(10,$fecha);
    $sql->bindValue(11,$cantidad);
    $sql->execute();

    }//cierre del foreach


    $sql2="insert into compras values(null,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$n_compra);
    $sql2->bindValue(2,$codigo_proveedor);
    $sql2->bindValue(3,$proveedor_compra);
    $sql2->bindValue(4,$tipo_compra);
    $sql2->bindValue(5,$tipo_pago);
    $sql2->bindValue(6,$plazo);
    $sql2->bindValue(7,$fecha);
    $sql2->bindValue(8,$sucursal);
    $sql2->bindValue(9,$tipo_documento);
    $sql2->bindValue(10,$documento);
    $sql2->bindValue(11,$usuario);
    $sql2->bindValue(12,$total_compra);
    $sql2->bindValue(13,$estado);

    $sql2->execute();
}
///////////FIN CLASE REGISTRA COMPRAS

///GET COMPRAS ESTADO CERO PARA INGRESOS A BODEGA
public function get_compras_ingresar(){
$conectar= parent::conexion();         
$sql= "select*from compras where estado='0';";
$sql=$conectar->prepare($sql);
$sql->execute();
return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

}//FIN DE LA CLASE
