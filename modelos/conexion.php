<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("sqlsrv:Server=192.168.21.254,1433;Database=master", "sa", "A1B2C3.$");
		return $link;
	}
	static public function conectarDataWareHouse(){
		$link = new PDO("sqlsrv:Server=192.168.21.245,1433;Database=TIENDAS_MELE", "sa", "A1B2C3.$");
		return $link;
	}
	static public function conectarTiendas($ip){
		$link = new PDO("sqlsrv:Server=$ip;Database=master", "sa", "A1B2C3.$");
		return $link;
	}
}