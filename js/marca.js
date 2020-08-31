function guardarMarca(){
	var nom_marca=$("#marca").val();
	// Se valida el campo de ingreso de marca
	if(nom_marca !=""){
	$.ajax({
		url:"ajax/marca.php?op=guardar_marca",
		method:"POST",
		data:{nom_marca:nom_marca},
		cache: false,
		dataType: "json",
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