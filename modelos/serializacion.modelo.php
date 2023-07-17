<?php
require_once "conexion.php";
class ModeloSerializacion{
	static public function mdlMostrarConsultarFacturas($tabla,$estatus,$fechaInicial,$fechaFinal){
		if ($estatus == "'Todas'") {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE CAST(Fecha AS DATE) BETWEEN '$fechaInicial' AND '$fechaFinal'");
			$stmt -> execute();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE EstatusSerializacion = $estatus AND CAST(Fecha AS DATE) BETWEEN '$fechaInicial' AND '$fechaFinal'");
			$stmt -> execute();
		}
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}