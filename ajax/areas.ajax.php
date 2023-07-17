<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "ERP_POS_CENTRAL";
	$tabla = "[Venta].[spObtenerInformacionAreas]";
	$r = ModeloMaestros::mdlMostrarAreas($servidor, $tabla, $bd);
	print_r($r[0]);