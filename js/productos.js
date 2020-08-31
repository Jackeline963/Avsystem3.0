var tabla_aros;
var tabla_aros_creados;

function init(){
  listar_aros();
  listar_aros_creados();
}
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 5000
    });

//////////////////////LISTADO DE AROS CREAODOS///////////////

/////////LISTAR AROS
function listar_aros_creados()
{
  tabla_aros_creados=$('#data_lista_aros_creados').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
buttons: ['copyHtml5', {
           extend: 'excelHtml5',
           text: 'Descargar Excel',
           filename: function() {
               var date_edition = 'Productos creados '+moment().format("DD-MM-YYYY HH[h]mm")
               var selected_machine_name = $("#output_select_machine select option:selected").text()
               return date_edition + ' - ' + selected_machine_name
           },
           sheetName: 'Output logiciel complet',
           title : null
       }],
    "ajax":
        {
          url: 'ajax/productos.php?op=listar_aros_creados',
          type : "get",
          dataType : "json",
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

/////////////////FIN LISTADO AROS CREADOS

function boot_b(){
    Swal.fire({icon:'error',title:'Oops...',text:'Something went wrong!',footer:'<a href>Why do I have this issue?</a>'})
}

function exitoso(){
 Toast.fire({
    type: 'success',
    title: 'Producto registrado exitosamente'
  })
}
///////////////GUARDAR ARO
function guardarAro(){
	var marca_aros =$("#marca_aros").val();
	var modelo_aro =$("#modelo_aro").val();
	var color_aro =$("#color_aro").val();
	var medidas_aro =$("#medidas_aro").val();
	var diseno_aro =$("#diseno_aro").val();
	var materiales_aro =$("#materiales_aro").val();
	var cat_venta_aros =$("#cat_venta_aros").val();
	var categoria_producto =$("#categoria_producto").val();

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(marca_aros != "" && modelo_aro != "" && color_aro != "" && medidas_aro != "" && diseno_aro != "" && materiales_aro != ""){
    $.ajax({
    url:"ajax/productos.php?op=guardar_aros",
    method:"POST",
    data:{marca_aros:marca_aros,modelo_aro:modelo_aro,color_aro:color_aro,medidas_aro:medidas_aro,diseno_aro:diseno_aro,materiales_aro:materiales_aro,cat_venta_aros:cat_venta_aros,categoria_producto:categoria_producto},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },
    success:function(data){
      //$('#resultados_ajax').html(data);
      console.log(data);
      if(data=='error'){
        Swal.fire('Producto ya Existe!','','error')
        return false;
      }else if (data=="ok") {
        Swal.fire('Se creado un nuevo Producto!','','success')
        setTimeout ("explode();", 2000);
      }

    }
});
}else{
    //bootbox.alert("Algun campo obligatorio no fue llenado correctamente");
Swal.fire('Hay Campos que no han sido completados o Seleccionados!','','error'
)
    return false;
}
} //cierre del condicional de validacion de los campos del paciente
  function explode(){
    location.reload();
  }


/////////LISTAR AROS
function listar_aros()
{
  tabla_aros=$('#data_aros').dataTable(
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
          url: 'ajax/productos.php?op=listar_aros',
          type : "get",
          dataType : "json",
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

init();
