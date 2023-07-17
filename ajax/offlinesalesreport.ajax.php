<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "ERP_POS_CENTRAL";
	$fechaInicial = $_POST["fechaInicial"];
	$fechaFinal = $_POST["fechaFinal"];
	$horaI = date('00:00:00');
	$horaF = date('23:59:59');
	$dateI = $fechaInicial.'T'.$horaI;
	$dateF = $fechaFinal.'T'.$horaF;
	$valor1a = "'".$dateI."'";
	$valor2b = "'".$dateF."'";
	$valor3c = "'".$_POST["caja"]."'";
	$valor4d = "'".$_POST["operador"]."'";
	$tabla = "[Venta].[spReportedeVentasOffline]";
	$datos = $valor1a.','.$valor2b.','.$valor3c.','.$valor4d;
	$r = ModeloMaestros::mdlMostrarVentasOffline($tabla, $servidor, $bd, $datos);
	foreach ($r as $key => $value) {
		print_r($value[0]);
	}