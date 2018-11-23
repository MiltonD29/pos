<?php

require_once "conexion.php";

class ModeloProveedores {

	/*===========================================
	=            MOSTRAR PROVEEDORES            =
	===========================================*/
	static public function mdlMostrarProveedores( $tabla, $item, $valor ){

		if ( $item != null ) {
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

		}

		/*========================================
	=            EDITAR PROVEEDOR            =
	========================================*/
		static public function mdlEditarProveedor( $tabla, $datos ){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, rfc = :rfc, telefono = :telefono, direccion = :direccion, cuenta_bancaria = :cuenta_bancaria WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta_bancaria", $datos["cuenta_bancaria"], PDO::PARAM_STR);

		if ( $stmt->execute() ) {
			
			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}
		
	/*=======================================
		=            CREAR PROVEEDOR            =
		=======================================*/
	static public function mdlIngresarProveedor( $tabla, $datos ){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, rfc, telefono, direccion, cuenta_bancaria) VALUES (:nombre, :rfc, :telefono, :direccion, :cuenta_bancaria)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta_bancaria", $datos["cuenta_bancaria"], PDO::PARAM_STR);

		if ( $stmt->execute() ) {
			
			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}
	
	/*========================================
	=            BORRAR PROVEEDOR            =
	========================================*/
	static public function mdlEliminarProveedor( $tabla, $datos ){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ( $stmt -> execute() ) {
			
			return "ok";

		} else {

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}
	
	
	
	

}