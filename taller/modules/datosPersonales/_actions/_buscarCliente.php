<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';

$nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : "";
$apellido = isset($_REQUEST["apellido"]) ? $_REQUEST["apellido"] : "";
$run = isset($_REQUEST["run"]) ? $_REQUEST["run"] : "";
$patente = isset($_REQUEST["patente"]) ? $_REQUEST["patente"] : "";

echo json_encode(obtenerClientesSegunParametros($nombre,$apellido,$run,$patente));

?>
