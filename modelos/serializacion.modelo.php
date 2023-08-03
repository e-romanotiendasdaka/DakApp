<?php
require_once "conexion.php";
class ModeloSerializacion{
	static public function mdlMostrarConsultarFacturas($datos){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $datos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarConsultarFacturasTiendas($ip,$datos2){
		$stmt = Conexion::conectarTiendas($ip)->prepare("SET NOCOUNT ON; EXEC $datos2");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}