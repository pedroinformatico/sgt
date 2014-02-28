<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';
require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';

$idAuto = isset($_REQUEST["idAuto"]) ? $_REQUEST["idAuto"] : "";
$kilometraje = isset($_REQUEST["kilometraje"]) ? $_REQUEST["kilometraje"] : "";
$fechaIngreso = isset($_REQUEST["fechaIngreso"]) ? $_REQUEST["fechaIngreso"] : "";
$descripcion = isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
$runCliente = isset($_REQUEST["runCliente"]) ? $_REQUEST["runCliente"] : "";


$cliente =  obtenerClientePorRun($runCliente);
$idFicha = insertarVisita($cliente->idCliente, $idAuto, $kilometraje, $fechaIngreso, $descripcion);

?>
