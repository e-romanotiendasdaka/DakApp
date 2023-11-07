<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$tabla = "[dbo].[VentaspObtenerCajaReporteVentaOffline]";
	$r = ModeloMaestros::mdlMostrarCajas($servidor, $bd, $tabla);
	print_r($r[0]);