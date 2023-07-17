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
	$valor3c = "'".$_POST["asesor"]."'";
	$valor4d = "'".$_POST["facturas"]."'";
	$valor5e = "'".$_POST["cajas"]."'";
	$valor6f = "'".$_POST["areas"]."'";
	$tabla = "[Venta].[spReporteAsesoresOffline]";
	$datos = $valor1a.','.$valor2b.','.$valor3c.','.$valor4d.','.$valor5e.','.$valor6f;
	$r = ModeloMaestros::mdlMostrarVentasAsesorOffline($tabla, $servidor, $bd, $datos);
	foreach ($r as $key => $value) {
		print_r($value[0]);
	}