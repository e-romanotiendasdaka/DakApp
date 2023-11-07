<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$tabla = "[dbo].[VentaspObtenerOperadorReporteVentaOffline]";
	$r = ModeloMaestros::mdlMostrarOperadores($servidor, $bd, $tabla);
	print_r($r[0]);