<?php

class Conexion {

	static public function conectar(){

		$link = new PDO("mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=pos","bf50f917fb27b6","1915e23f");

		$link -> exec("set names utf8");

		return $link;

	}

}