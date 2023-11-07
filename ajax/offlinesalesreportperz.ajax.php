<?php
require_once "../modelos/maestros.modelo.php";
	$bd = "master.dbo";
	$fechaInicial = $_POST["fechaInicial"];
	$fechaFinal = $_POST["fechaFinal"];
	$horaI = date('00:00:00');
	$horaF = date('23:59:59');
	$dateI = $fechaInicial.' '.$horaI;
	$dateF = $fechaFinal.' '.$horaF;
	$valor1a = "'".$dateI."'";
	$valor2b = "'".$dateF."'";
	$tabla = "spReportedeVentasOffline";
"[VSRV-VL-POSM]"
"[VSRV-TG-POSM]"
"[VSRV-CN-POSM]"
"[VSRV-SD-POSM]"
"[VSRV-GC-POSM]"
"[VSRV-MTN-POSM]"
"[VSRV-MR-POSM]"
"[VSRV-BC-POSM]"
"[VSRV-SF-POSM]"
"[VSRV-LC-POSM]"
"[VSRV-SC-POSM]"
"[VSRV-BQ-POSM]"
"[VSRV-ORDAZ-POSM]"
"[VSRV-RCREO-POSM]"
"[VSRV-VP-POSM]"
"[VSRV-TR-POSM]"
"[VSRV-CH-POSM]"
"[VSRV-CR-POSM]"
"[VSRV-BOL-POSM]"
"[VSRV-BM-POSM]"
"[VSRV-PAR-POSM]"
"[VSRV-MCBO-POSM]"
"[VSRV-PF-POSM]"
"[VSRV-PC-POSM]"
"[VSRV-ACARIGUA-P]"
"[VSRV-PL-POSM]"
"[VSRV-MC-POSM]"
"[VSRV-PLC-POSM]"

	$servidor = "[VSRV-CN-POSM]";
	$r = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	$servidor = "[VSRV-VL-POSM]";
	$r1 = ModeloMaestros::mdlMostrarVentasOfflinePerz($servidor,$bd,$tabla,$valor1a,$valor2b);
	foreach ($r1 as $key => $value) {
		$server [] = $value;
	}
	print_r($server);