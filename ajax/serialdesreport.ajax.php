<?php
require_once "../modelos/serializacion.modelo.php";
	$tabla = $_POST['tabla'];
	$fechaInicial = $_POST['fechaInicial'];
	$fechaFinal = $_POST['fechaFinal'];
	$estatus = "'".$_POST["estatus"]."'";
	$respuesta = ModeloSerializacion::mdlMostrarConsultarFacturas($tabla,$estatus,$fechaInicial,$fechaFinal);
	echo json_encode($respuesta);