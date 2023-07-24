<?php
require_once "../modelos/maestros.modelo.php";
	$tabla = "ComisionesAsesores_Test";
	$fechaInicial = $_POST['fechaInicial'];
	$fechaFinal = $_POST['fechaFinal'];
	$codigoSucursal = $_POST["sucursal"];
	$respuesta = ModeloMaestros::mdlDataWareHouse($tabla,$codigoSucursal,$fechaInicial,$fechaFinal);
	echo json_encode($respuesta);