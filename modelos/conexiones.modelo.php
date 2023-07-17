<?php
require_once "conexion.php";
class ModeloConexiones{
	static public function linkedServerConnected($servidor, $id){
		$stmt = Conexion::conectar()->prepare("EXEC ConexionesServerMele $servidor,$id");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
}