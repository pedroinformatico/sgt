<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/vehiculos/_actions/_functions.php';
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';

$runCliente = isset($_REQUEST["runCliente"]) ? $_REQUEST["runCliente"] : "";

$cliente = obtenerClientePorRun($runCliente);

echo json_encode(obtenerPatentesPorCliente($cliente->idCliente));

?>

