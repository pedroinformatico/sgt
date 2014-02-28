<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/vehiculos/_actions/_functions.php';
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';

$marca = isset($_REQUEST["marca"]) ? $_REQUEST["marca"] : "";
$modelo = isset($_REQUEST["modelo"]) ? $_REQUEST["modelo"] : "";
$patente = isset($_REQUEST["patente"]) ? $_REQUEST["patente"] : "";
$anio = isset($_REQUEST["anio"]) ? $_REQUEST["anio"] : "";
$kilometraje = isset($_REQUEST["kilometraje"]) ? $_REQUEST["kilometraje"] : "";
$vin = isset($_REQUEST["vin"]) ? $_REQUEST["vin"] : "";
$runCliente = isset($_REQUEST["runCliente"]) ? $_REQUEST["runCliente"] : "";

$idVehiculo = insertarVehiculo($marca,$modelo,$patente,$anio,$kilometraje,$vin);
$cliente =  obtenerClientePorRun($runCliente);
relacionarClienteAuto($idVehiculo, $cliente->idCliente);

?>
