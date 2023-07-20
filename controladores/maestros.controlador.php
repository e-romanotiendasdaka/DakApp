<?php
class ControladorMaestros{
	static public function ctrMostrarSucursales(){
		$respuesta = ModeloMaestros::mdlMostrarSucursales();
		return $respuesta;
	}
	static public function ctrSucursal($id){
		$respuesta = ModeloMaestros::mdlSucursal($id);
		return $respuesta;
	}
}