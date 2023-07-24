<?php
require_once "conexion.php";
class ModeloMaestros{
	static public function linkedServerConected($servidor, $id){
		$stmt = Conexion::conectar()->prepare("EXEC ConexionesServerMele $servidor.$id");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}	
	static public function mdlMostrarSucursales(){
		$stmt = Conexion::conectar()->prepare("SELECT A.IdSucursal,A.IpServidor,A.Servidor,B.Sucursal,A.TablaLocal,B.CodigoSucursal FROM DK_Server AS A INNER JOIN DK_Sucursales B ON A.IdSucursal = B.IdSucursal");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlSucursal($id){
		$stmt = Conexion::conectar()->prepare("SELECT A.IdSucursal,A.IpServidor,A.Servidor,B.Sucursal,A.TablaLocal,B.CodigoSucursal FROM DK_Server AS A INNER JOIN DK_Sucursales B ON A.IdSucursal = B.IdSucursal WHERE A.IdSucursal = $id");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlDataWareHouse($tabla,$codigoSucursal,$fechaInicial,$fechaFinal){
		$stmt = Conexion::conectarDataWareHouse()->prepare("SELECT * FROM $tabla WHERE CodigoSucursal = $codigoSucursal AND CAST(Fecha AS DATE) BETWEEN '$fechaInicial' AND '$fechaFinal'");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarCajas($servidor, $tabla, $bd){
		$stmt = Conexion::conectar()->prepare("EXEC $servidor.$bd.$tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarOperadores($servidor, $tabla, $bd){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarAsesores($servidor, $tabla, $bd){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarAreas($servidor, $tabla, $bd){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarVentasOffline($tabla, $servidor, $bd, $datos){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla $datos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarVentasAsesorOffline($tabla, $servidor, $bd, $datos){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla $datos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarVentasDetalleOffline($tabla, $servidor, $bd, $datos){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla $datos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarVentasDescuentoOffline($tabla, $servidor, $bd, $datos){
		$stmt = Conexion::conectar()->prepare("SET NOCOUNT ON; EXEC $servidor.$bd.$tabla $datos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}