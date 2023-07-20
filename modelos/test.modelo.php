<?php
require_once "conexion.php";
class ModeloTets{
	static public function mdlMostrarTest(){
		$stmt = Conexion::conectarTest()->prepare("SELECT Fecha,CodigoSucursal,Sucursal,Cedula,Nombre,FechaIngresi,FechaEgreso,Departamento,Categoria1,Meta,UniVtas,Cumplimiento,BonoCat2,BonoMCD,ServInstalacion FROM ComisionesAsesores_Test");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}	
}