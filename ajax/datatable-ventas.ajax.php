<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class TablaProductosVentas {

	/*=====================================================
	=            MOSTRAR LA TABLA DE PRODUCTOS            =
	=====================================================*/
	public function mostrarTablaProductosVentas(){

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
											$botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";

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
															"'.$stock.'",
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
$activarProductos = new TablaProductosVentas();
$activarProductos -> mostrarTablaProductosVentas();


