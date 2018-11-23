/*======================================
=            EDITAR PROVEEDOR          =
======================================*/
$(".tablas").on( "click", ".btnEditarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");

	var datos = new FormData();
	datos.append("idProveedor", idProveedor);

	$.ajax({

		url: "ajax/proveedores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log(respuesta);

			$("#idProveedor").val(respuesta["id"]);
			$("#editarProveedor").val(respuesta["nombre"]);
			$("#editarRfc").val(respuesta["rfc"]);
			$("#editarTelefonoProveedor").val(respuesta["telefono"]);
			$("#editarDireccionProveedor").val(respuesta["direccion"]);
			$("#editarCuentaBancaria").val(respuesta["cuenta_bancaria"]);

		}

	})

})

/*========================================
=            ELIMINAR PROVEEDOR          =
========================================*/
$(".tablas").on("click", ".btnEliminarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");

	swal({

		title: "¿Estás seguro de borrar el proveedor?",
		text: "Si no está seguro puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Cancelar",
		confirmButtonText: "Sí, borrar"

	}).then(function(result){

		if ( result.value ) {

			window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;

		}

	})

})



