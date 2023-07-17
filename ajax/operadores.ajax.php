<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "ERP_POS_CENTRAL";
	$tabla = "[Venta].[spObtenerOperadorReporteVentaOffline]";
	$r = ModeloMaestros::mdlMostrarOperadores($servidor, $tabla, $bd);
	print_r($r[0]);