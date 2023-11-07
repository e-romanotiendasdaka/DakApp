<?php
require_once "../modelos/maestros.modelo.php";
	$servidor = "[".$_POST["Servidor"]."]";
	$bd = "[master]";
	$fechaInicial = $_POST["fechaInicial"];
	$fechaFinal = $_POST["fechaFinal"];
	$horaI = date('00:00:00');
	$horaF = date('23:59:59');
	$dateI = $fechaInicial.'T'.$horaI;
	$dateF = $fechaFinal.'T'.$horaF;
	$valor1a = "'".$dateI."'";
	$valor2b = "'".$dateF."'";
	$valor3c = "'".$_POST["asesor"]."'";
	$valor5e = "'".$_POST["cajas"]."'";
	$valor6f = "'".$_POST["areas"]."'";
	$tabla = "[dbo].[VentaspReporteVentaConDescuentosOffline]";
	$datos = $valor1a.','.$valor2b.','.$valor3c.','.$valor5e.','.$valor6f;
	$r = ModeloMaestros::mdlMostrarVentasDescuentoOffline($tabla, $servidor, $bd, $datos);
	foreach ($r as $key => $value) {
		print_r($value[0]);
	}