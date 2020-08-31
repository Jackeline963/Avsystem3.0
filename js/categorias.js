function guardarCategoria(){
	var cat_nombre =$("#cat_nombre").val();
	var cat_sucursal =$("#cat_sucursal").val();
	var cat_descripcion =$("#cat_descripcion").val();

	// Se validan los campos de llanado del formulario categorias
	if (cat_nombre !="" && cat_sucursal !="" && cat_descripcion !="") {
		$.ajax({
		url:"ajax/categoria.php?op=guardar_categoria",
    method:"POST",
    data:{cat_nombre:cat_nombre, cat_sucursal:cat_sucursal, cat_descripcion:cat_descripcion},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },
   success:function(data){
    console.log(data);
     alert("¡Los datos han sido guardados exitosamente!");
    }

	});
	}
}