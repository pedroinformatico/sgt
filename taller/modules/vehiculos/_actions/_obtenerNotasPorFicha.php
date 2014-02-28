<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';

$idFicha = isset($_REQUEST["idFicha"]) ? $_REQUEST["idFicha"] : "";
echo json_encode(obtenerNotasPorFicha($idFicha));