<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos {

	/*=====================================================
	=            MOSTRAR LA TABLA DE PRODUCTOS            =
	=====================================================*/
	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

		$datosJson = '
									{
										"data": [';

										for ($i=0; $i < count($productos); $i++) { 

											/*----------  Traemos la imagen  ----------*/
											$imagen = "<img class='img-thumbnail' src='".$productos[$i]["imagen"]."' width='40px'>";

											/*----------  Traemos las acciones  ----------*/
											$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto btn-sm' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto btn-sm' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";
											
											/*----------  Traemos la categoría  ----------*/
											$item = "id";
											$valor = $productos[$i]["id_categoria"];

											$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

											/*----------  Status del Stock  ----------*/
											if ( $productos[$i]["stock"] <= 10 ) {
												
												$stock = "<button class='btn btn-danger btn-xs' style='width: 40px'>".$productos[$i]["stock"]."</button>";

											} else if ( $productos[$i]["stock"] >= 11 && $productos[$i]["stock"] <= 15 ) {
												
												$stock = "<button class='btn btn-warning btn-xs' style='width: 40px'>".$productos[$i]["stock"]."</button>";

											} else {

												$stock = "<button class='btn btn-success btn-xs' style='width: 40px'>".$productos[$i]["stock"]."</button>";

											}
											
											$datosJson .= '[
															"'.($i+1).'",
															"'.$imagen.'",
															"'.$productos[$i]["codigo"].'",
															"'.$productos[$i]["descripcion"].'",
															"'.$categorias["categoria"].'",
															"'.$stock.'",
															"'.$productos[$i]["precio_compra"].'",
															"'.$productos[$i]["precio_venta"].'",
															"'.$productos[$i]["fecha"].'",
															"'.$botones.'"
														],';

										}
										$datosJson = substr($datosJson, 0, -1);

									$datosJson .= ']}';

								echo $datosJson;

	}

}

/*==================================================
=            ACTIVAR TABLA DE PRODUCTOS            =
==================================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();


