<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$tabla = "[dbo].[VentaspObtenerInformacionAreas]";
	$r = ModeloMaestros::mdlMostrarAreas($servidor, $tabla, $bd);
	print_r($r[0]);