<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';


$idRegion = isset($_REQUEST["idRegion"]) ? $_REQUEST["idRegion"] : "";

echo json_encode(obtenerComunas($idRegion));


?>

