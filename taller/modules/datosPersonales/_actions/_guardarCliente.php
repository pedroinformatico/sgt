<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';

$nombres = isset($_REQUEST["nombres"]) ? $_REQUEST["nombres"] : "";
$apellidos = isset($_REQUEST["apellidos"]) ? $_REQUEST["apellidos"] : "";
$run = isset($_REQUEST["run"]) ? $_REQUEST["run"] : "";
$correo = isset($_REQUEST["correo"]) ? $_REQUEST["correo"] : "";
$calle = isset($_REQUEST["calle"]) ? $_REQUEST["calle"] : "";
$poblacion = isset($_REQUEST["poblacion"]) ? $_REQUEST["poblacion"] : "";
$numeroDomicilio = isset($_REQUEST["numeroDomicilio"]) ? $_REQUEST["numeroDomicilio"] : "";
$depto = isset($_REQUEST["depto"]) ? $_REQUEST["depto"] : "";
$telefonoCelular = isset($_REQUEST["celular"]) ? $_REQUEST["celular"] : "";
$telefonoFijo = isset($_REQUEST["telefonoFijo"]) ? $_REQUEST["telefonoFijo"] : "";
$idComuna = isset($_REQUEST["idComuna"]) ? $_REQUEST["idComuna"] : "";

insertarCliente($nombres, $apellidos, $run, $correo, $calle, $poblacion, $depto,
        $numeroDomicilio, $telefonoCelular, $telefonoFijo,$idComuna);



?>
