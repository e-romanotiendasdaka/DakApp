<?php
require_once "../modelos/conexiones.modelo.php";
	$servidor = "[".$_POST["servidor"]."]";
	$id = $_POST["id"];
	$r = ModeloConexiones::linkedServerConnected($servidor, $id);
	echo json_encode($r);