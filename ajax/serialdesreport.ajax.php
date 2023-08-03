<?php
require_once "../modelos/serializacion.modelo.php";
	$ip = $_POST['ip'];
	$id = $_POST['id'];
	$fechaInicial = $_POST['fechaInicial'];
	$fechaFinal = $_POST['fechaFinal'];
	$horaI = date('00:00:00');
	$horaF = date('23:59:59');
	$dateI = $fechaInicial.'T'.$horaI;
	$dateF = $fechaFinal.'T'.$horaF;
	$valor1a = "'".$dateI."'";
	$valor2b = "'".$dateF."'";
	$estatus = "'".$_POST["estatus"]."'";
	$Servidor = "[".$_POST["Servidor"]."]";
	$param  = 'master.dbo.SerializacionConsultarFacturas '.$valor1a.','.$valor2b.','.$estatus;
	$datos2 = 'SerializacionConsultarFacturas '.$valor1a.','.$valor2b.','.$estatus;
	$datos  = $Servidor.'.'.$param;
	if ($id == 0) {
		$respuesta = ModeloSerializacion::mdlMostrarConsultarFacturas($datos);
		echo json_encode($respuesta);
	}else{
		$respuesta = ModeloSerializacion::mdlMostrarConsultarFacturasTiendas($ip,$datos2);
		echo json_encode($respuesta);
	}