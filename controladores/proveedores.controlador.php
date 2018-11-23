<?php

class ControladorProveedores {

	/*===========================================
	=            MOSTRAR PROVEEDORES            =
	===========================================*/
	static public function ctrMostrarProveedores( $item, $valor ){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedores( $tabla, $item, $valor );

		return $respuesta;

	}

	/*=======================================
	=            CREAR PROVEEDOR            =
	=======================================*/
	static public function ctrCrearProveedor(){

		if ( isset($_POST["nuevoProveedor"]) ) {
			
			if ( preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
					 preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRfc"]) &&
					 preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefonoProveedor"]) &&
					 preg_match('/^[#\.\,\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccionProveedor"]) &&
					 preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCuentaBancaria"])
				 ) {
				
				$tabla = "proveedores";

				$datos = array(
												"nombre" => $_POST["nuevoProveedor"],
												"rfc" => $_POST["nuevoRfc"],
												"telefono" => $_POST["nuevoTelefonoProveedor"],
												"direccion" => $_POST["nuevaDireccionProveedor"],
												"cuenta_bancaria" => $_POST["nuevaCuentaBancaria"]
											);

				$respuesta = ModeloProveedores::mdlIngresarProveedor( $tabla, $datos );

				if ( $respuesta == "ok" ) {
					
					echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El proveedor ha sido guardada correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

				}

			} else {

				echo '<script>
	
								swal({
									
									type: "error",
									title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

			}

		}

	}
	
	/*========================================
	=            EDITAR PROVEEDOR            =
	========================================*/
	static public function ctrEditarProveedor(){

		if ( isset($_POST["editarProveedor"]) ) {
			
			if ( preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) &&
					 preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRfc"]) &&
					 preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefonoProveedor"]) &&
					 preg_match('/^[#\.\,\-a-zA-Z0-9 ]+$/', $_POST["editarDireccionProveedor"]) &&
					 preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCuentaBancaria"])
				 ) {
				
				$tabla = "proveedores";

				$datos = array(
												"nombre" => $_POST["editarProveedor"],
												"rfc" => $_POST["editarRfc"],
												"telefono" => $_POST["editarTelefonoProveedor"],
												"direccion" => $_POST["editarDireccionProveedor"],
												"cuenta_bancaria" => $_POST["editarCuentaBancaria"]
											);

				$respuesta = ModeloProveedores::mdlEditarProveedor( $tabla, $datos );

				if ( $respuesta == "ok" ) {
					
					echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El proveedor ha sido editado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

				}

			} else {

				echo '<script>
	
								swal({
									
									type: "error",
									title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

			}

		}

	}
	
	/*========================================
	=            BORRAR PROVEEDOR            =
	========================================*/
	static public function ctrBorrarProveedor(){

		if ( isset($_GET["idProveedor"]) ) {
			
			$tabla = "proveedores";
			$datos = $_GET["idProveedor"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor( $tabla, $datos );

			if ( $respuesta == "ok" ) {
					
					echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El proveedor ha sido eliminada correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

				} else {

				echo '<script>
	
								swal({
									
									type: "error",
									title: "Error",
									text: "No se ha podido eliminar el proveedor, intenta de nuevo."
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "proveedores";

									}

								});

							</script>';

			}

		}

	}
	
	
	
	

}