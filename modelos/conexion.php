<?php

/*mysql://bf50f917fb27b6:1915e23f@us-cdbr-iron-east-01.cleardb.net/heroku_aaf7f9df83d10c5?reconnect=true*/

class Conexion {

	static public function conectar(){

		$link = new PDO("mysql:host=us-cdbr-iron-east-01.cleardb.net:3306;dbname=pos","bf50f917fb27b6","1915e23f");

		$link -> exec("set names utf8");

		return $link;

	}

}