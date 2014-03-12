<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once '_functions.php';

$idVisita = isset($_REQUEST["idVisita"]) ? $_REQUEST["idVisita"] : "";
echo json_encode(obtenerDatosVisitaImprimir($idVisita));