
var tablas_compras_ingreso_bodegas;
function init(){
  //ingresar_compras_bodega();
}
 function ingresar_compras_bodega() {
 	$('#modal_ingreso_bodega').modal('show');
 	var numero_compra = $("#numero_compra_bod").val();
 	tablas_compras_ingreso_bodegas=$('#data_productos_ingresos_bodega').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      responsive: true,
      buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: 'ajax/bodegas.php?op=listar_productos_ingreso_bodegas',
          type : "post",
          data:{numero_compra:numero_compra},
          error: function(e){
            console.log(e.responseText);
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)

      "language": {

          "sProcessing":     "Procesando...",

          "sLengthMenu":     "Mostrar _MENU_ registros",

          "sZeroRecords":    "No se encontraron resultados",

          "sEmptyTable":     "Ningún dato disponible en esta tabla",

          "sInfo":           "Mostrando un total de _TOTAL_ registros",

          "sInfoEmpty":      "Mostrando un total de 0 registros",

          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix":    "",

          "sSearch":         "Buscar:",

          "sUrl":            "",

          "sInfoThousands":  ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {

              "sFirst":    "Primero",

              "sLast":     "Último",

              "sNext":     "Siguiente",

              "sPrevious": "Anterior"

          },

          "oAria": {

              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

              "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }

         }//cerrando language

  }).DataTable();
}

///////////////INGRESAR PRODUCTOS A BODEGA
var detalles = [];
function agregaIngreso(id_producto,numero_compra){
  $.ajax({
  url:"ajax/bodegas.php?op=buscar_producto_por_compra",
  method:"POST",
  data:{id_producto:id_producto,numero_compra:numero_compra},
  cache: false,
  dataType:"json",
  success:function(data){
    console.log(data);   
    var obj = {
      id_producto: data.id_producto,
      cantidad : '',
      ubicacion  : '',
      numero_compra   : data.numero_compra,
      descripcion  : data.descripcion,
    };//Fin objeto
    detalles.push(obj);
    listarDetallesIngresos();
    console.log(detalles);
    }//fin success
  });//fin de ajax
  $('#modal_ingreso_bodega').modal("hide");
  
}

function listarDetallesIngresos(){

    $('#listar_productos_de_ingreso').html('');
    var filas = "";

    for(var i=0; i<detalles.length; i++){

    //var subtotal = detalles[i].subtotal = detalles[i].cantidad * detalles[i].precio_compra;

        var filas = filas + "<tr id='fila"+i+"'><td>"+(i+1)+
        "</td>"+"<td style='text-align:center;'>"+detalles[i].numero_compra+
        "</td>"+"<td style='text-align:center;'><span>"+detalles[i].descripcion+"</span></td>"+"<td>"+"<input type='number'class='form-control' onClick='setCant(event, this, "+(i)+");' onKeyUp='setCant(event, this, "+(i)+");' value='"+detalles[i].cantidad+"' pattern='^[0-9]+'>"+"</td>"+"</tr>";

    //subtotal = subtotal + importe;

  }//cierre for

  $('#listar_productos_de_ingreso').html(filas);

}
 
function setUbicacion(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].ubicacion = String(obj.value);
  	//recalcular(idx);
}

function setCant(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].cantidad = String(obj.value);
  	//recalcular(idx);
}

 function registrarIngresoBodega(){

  var fecha_ingreso = $("#fecha_ingreso").val();
  var usuario = $("#usuario").val();
  var sucursal_i = $("#sucursal_i").html();
  var numero_compra_i = $("#numero_compra_i").html();
  var categoria_ubicacion = $("#categoria_ubicacion").val();
  var contador = 0;
  count_fields_empty=[];
  for(var i=0;i<detalles.length;i++){
    var cantidad = detalles[i].cantidad;
    var ubicacion = detalles[i].ubicacion;
    var cant_items = parseInt(cantidad);    
      //alert(currentNumber);
    if(cantidad == ''){
      count_fields_empty.push(cantidad);
    }
    contador = contador+cant_items;
  }

//////////////VALIDAR QUE SE ENVIEN PRODUCTOS A LA BD
var test_array = detalles.length;
  if (test_array<1) {
  Swal.fire('Debe Agregar Productos al Ingreso!','','error')
  return false;
}
//////////////VALIDAR QUE CAMPOS UBCACION Y CANTIDAD NOT EMPTY
var cuenta_vacios = count_fields_empty.length;
if (cuenta_vacios>0) {
  Swal.fire('Debe seleccionar la cantidad en cada item!','','error')
  return false;
}

if(categoria_ubicacion != ""){
    console.log('Message Oscar');
    $.ajax({
    url:"ajax/bodegas.php?op=registrar_ingreso_a_bodega",
    method:"POST",
    data:{'arrayIngresoBodega':JSON.stringify(detalles),'fecha_ingreso':fecha_ingreso,'usuario':usuario,'sucursal_i':sucursal_i,'numero_compra_i':numero_compra_i,'categoria_ubicacion':categoria_ubicacion},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
    success:function(data){  
    }

  });
    setTimeout ("Swal.fire('Se ha registrado Exitosamente el ingreso a Bodega','','success')", 100)
    setTimeout ("explode();", 2000);
  }else{
  	setTimeout ("Swal.fire('Seleccione el destino de Ingreso','','error')", 100)
  }

}
init();