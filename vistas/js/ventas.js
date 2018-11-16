/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

/*$.ajax({

	url: "ajax/datatable-ventas.ajax.php",
	success:function(respuesta){
		
		console.log("respuesta", respuesta);

	}

})*/

$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
		"retrieve": true,
		"processing": true,
	 	"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
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

	}

} );

/*=====================================================================
=            AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA            =
=====================================================================*/
$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({

		url: 'ajax/productos.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			var id = respuesta["id"];
			var descripcion = respuesta["descripcion"];
			var stock = respuesta["stock"];
			var precio = respuesta["precio_venta"];

			/*----------  Evitar agregar producto cuando el stock esté en 0  ----------*/
			if ( stock == 0  ) {

				swal({
					title: "No hay stock disponible",
					type: "error",
					confirmButtonText: "Cerrar"
				});

				$("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

				return;

			}

			$(".nuevoProducto").append(

				'<div style="display: flex; flex-direction: row">'+
					'<!-- Descripción -->'+
	        '<div class="form-group">'+
	          '<div class="input-group" style="width: 100%">'+
	            '<span class="input-group-addon" style="padding: 4px 8px; width: 50px">'+
	              '<button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'">'+
	                '<i class="fa fa-times"></i>'+
	              '</button>'+
	            '</span>'+
	            '<input type="text" class="form-control" id="agregarProducto" name="agregarProducto" value="'+descripcion+'"  readonly required >'+
	          '</div>'+
	        '</div>'+

	        '<!-- Cantidad -->'+
	        '<div style="padding: 0px 5px 0px 5px">'+
	          '<input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" required >'+
	        '</div>'+

	        '<!-- Precio -->'+
	        '<div class="form-group">'+
	          '<div class="input-group">'+
	            '<span class="input-group-addon">'+
	              '<i class="ion ion-social-usd"></i>'+
	            '</span>'+
	            '<input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" value="'+precio+'" required readonly >'+
	          '</div>'+
	        '</div>'+
        '</div>'

			);

		}

	})

});

/*===========================================================================
=            CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA            =
===========================================================================*/
$(".tablaVentas").on("draw.dt", function(){

	if ( localStorage.getItem("quitarProducto") != null ) {

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

		}

	}

})



/*======================================================================
=            QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN            =
======================================================================*/
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	/*----------  Almacenar en el LocalStorage el ID del producto a quitar  ----------*/
	if( localStorage.getItem("quitarProducto") == null ){

		idQuitarProducto = [];

	} else {

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({"idProducto": idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass("btn-default");
	
	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");


});



