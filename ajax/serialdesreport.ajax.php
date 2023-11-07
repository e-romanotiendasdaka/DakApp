<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$fechaInicial = "'".$_POST['fechaInicial']."'";
	$fechaFinal = "'".$_POST['fechaFinal']."'";
	$estatus = "'".$_POST["estatus"]."'";
	$tabla = "[dbo].[SerializacionConsultarFacturas]";
	$datos = $fechaInicial.','.$fechaFinal.','.$estatus;
	$respuesta = ModeloMaestros::mdlConsultarFacturasSerializacion($tabla, $servidor, $bd, $datos);
	echo json_encode($respuesta);