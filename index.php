<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/maestros.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "modelos/conexiones.modelo.php";
require_once "modelos/maestros.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();