<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$tabla = "[dbo].[VentaspObtenerInformacionAsesores]";
	$r = ModeloMaestros::mdlMostrarAsesores($servidor, $bd, $tabla);
	foreach ($r as $key => $value) {
		print_r($value[0]);
	}