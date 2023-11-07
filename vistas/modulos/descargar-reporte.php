<?php

require_once "../../controladores/maestros.controlador.php";
require_once "../../modelos/maestros.modelo.php";

$reporte = new ControladorProductos();
$reporte -> ctrDescargarReporte();