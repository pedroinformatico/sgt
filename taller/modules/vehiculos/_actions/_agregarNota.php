<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';


$descripcion = isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
$idFicha = isset($_REQUEST["idFicha"]) ? $_REQUEST["idFicha"] : "";


$idNota = insertarNota($descripcion,'NULL');
relacionarFichaConNota($idFicha, $idNota);

?>
