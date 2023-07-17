<?php
class ControladorMaestros{
	static public function ctrMostrarSucursales(){
		$respuesta = ModeloMaestros::mdlMostrarSucursales();
		return $respuesta;
	}
}