<?php

class ControladorProductos {

	/*=========================================
	=            MOSTRAR PRODUCTOS            =
	=========================================*/
	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;

	}	

	/*======================================
	=            CREAR PRODUCTO            =
	======================================*/
	static public function ctrCrearProducto(){

		if ( isset($_POST["nuevaDescripcion"]) ) {
			
			if ( preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
					 preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])
				 ) {

				/*----------  Validar imagen  ----------*/

				$ruta = "vistas/img/productos/default/product_default.png";

				if ( isset($_FILES["nuevaImagen"]["tmp_name"]) ) {

					list( $ancho, $alto ) = getimagesize( $_FILES["nuevaImagen"]["tmp_name"] );
					
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*----------  Crear carpeta donde vamos a guardar la foto del producto  ----------*/

					$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

					mkdir( $directorio, 0755 );

					/*----------  De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP  ----------*/
					
					if ( $_FILES["nuevaImagen"]["type"] == "image/jpeg" ) {
						
						/*----------  Guardar imagen en la carpeta  ----------*/

						$aleatorio = mt_rand( 100,999 );

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg( $_FILES["nuevaImagen"]["tmp_name"] );

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg( $destino, $ruta );
						
					}

					if ( $_FILES["nuevaImagen"]["type"] == "image/png" ) {
						
						/*----------  Guardar imagen en la carpeta  ----------*/

						$aleatorio = mt_rand( 100,999 );

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng( $_FILES["nuevaImagen"]["tmp_name"] );

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng( $destino, $ruta );
						
					}
					
					
				}
				
				$tabla = "productos";

				$datos = array(
												"id_categoria" => $_POST["nuevaCategoria"],
												"codigo" => $_POST["nuevoCodigo"],
												"descripcion" => $_POST["nuevaDescripcion"],
												"stock" => $_POST["nuevoStock"],
												"precio_compra" => $_POST["nuevoPrecioCompra"],
												"precio_venta" => $_POST["nuevoPrecioVenta"],
												"imagen" => $ruta
											);

				$respuesta = ModeloProductos::mdlIngresarProducto( $tabla, $datos );

				if ( $respuesta == "ok" ) {
					
					echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El producto ha sido guardada correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "productos";

									}

								});

							</script>';

				}

			} else {

				echo '<script>
	
								swal({
									
									type: "error",
									title: "¡El producto no puede contener campos vacíos o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "productos";

									}

								});

							</script>';

			}

		}

	}

	/*=======================================
	=            EDITAR PRODUCTO            =
	=======================================*/
	static public function ctrEditarProducto(){

		if ( isset($_POST["editarDescripcion"]) ) {
			
			if ( preg_match('/^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
					 preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
					 preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])
				 ) {

				/*----------  Validar imagen  ----------*/

				$ruta = $_POST["imagenActual"];

				if ( isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"]) ) {

					list( $ancho, $alto ) = getimagesize( $_FILES["editarImagen"]["tmp_name"] );
					
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*----------  Crear carpeta donde vamos a guardar la foto del producto  ----------*/

					$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*----------  Primero preguntamos si existe otra imagen en la BD  ----------*/
					if ( !empty($_POST["imagenActual"] && $_POST["imagenActual"] != "vistas/img/productos/default/product_default.png") ) {
						
						unlink($_POST["imagenActual"]);

					} else {

						mkdir( $directorio, 0755 );

					}

					/*----------  De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP  ----------*/
					
					if ( $_FILES["editarImagen"]["type"] == "image/jpeg" ) {
						
						/*----------  Guardar imagen en la carpeta  ----------*/

						$aleatorio = mt_rand( 100,999 );

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg( $_FILES["editarImagen"]["tmp_name"] );

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg( $destino, $ruta );
						
					}

					if ( $_FILES["editarImagen"]["type"] == "image/png" ) {
						
						/*----------  Guardar imagen en la carpeta  ----------*/

						$aleatorio = mt_rand( 100,999 );

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng( $_FILES["editarImagen"]["tmp_name"] );

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng( $destino, $ruta );
						
					}
					
					
				}
				
				$tabla = "productos";

				$datos = array(
												"id_categoria" => $_POST["editarCategoria"],
												"codigo" => $_POST["editarCodigo"],
												"descripcion" => $_POST["editarDescripcion"],
												"stock" => $_POST["editarStock"],
												"precio_compra" => $_POST["editarPrecioCompra"],
												"precio_venta" => $_POST["editarPrecioVenta"],
												"imagen" => $ruta
											);

				$respuesta = ModeloProductos::mdlEditarProducto( $tabla, $datos );

				if ( $respuesta == "ok" ) {
					
					echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El producto ha sido editado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "productos";

									}

								});

							</script>';

				}

			} else {

				echo '<script>
	
								swal({
									
									type: "error",
									title: "¡El producto no puede contener campos vacíos o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "productos";

									}

								});

							</script>';

			}

		}

	}
	
	/*=======================================
	=            BORRAR PRODUCTO            =
	=======================================*/
	static public function ctrEliminarProducto(){

		if ( isset($_GET["idProducto"]) ) {
			
			$tabla = "productos";
			$datos = $_GET["idProducto"];

			if ( $_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/product_default.png") {
				
				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if ( $respuesta == "ok" ) {
				
				echo '<script>
	
								swal({
									
									type: "success",
									title: "¡El producto ha sido borrado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){
					
									if( result.value ){

										window.location = "productos";

									}

								});

							</script>';

			}

		}

	}
	
	

}

