<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';


$descripcion = isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
$idVisita = isset($_REQUEST["idVisita"]) ? $_REQUEST["idVisita"] : "";


$idNota = insertarNota($descripcion,'NULL');
relacionarVisitaConNota($idVisita, $idNota);

?>
