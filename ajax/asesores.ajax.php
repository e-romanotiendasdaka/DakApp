<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "ERP_POS_CENTRAL";
	$tabla = "[Venta].[spObtenerInformacionAsesores]";
	$r = ModeloMaestros::mdlMostrarAsesores($servidor, $tabla, $bd);
	foreach ($r as $key => $value) {
		print_r($value[0]);
	}