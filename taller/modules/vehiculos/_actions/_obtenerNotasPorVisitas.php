<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';

$idVisita = isset($_REQUEST["idVisita"]) ? $_REQUEST["idVisita"] : "";
echo json_encode(obtenerNotasPorVisita($idVisita));