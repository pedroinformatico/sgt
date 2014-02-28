<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/gestionDeFichas/_actions/_functions.php';

$idAuto = isset($_REQUEST["idAuto"]) ? $_REQUEST["idAuto"] : "";
echo json_encode(obtenerFichasPorIdAuto($idAuto));

?>


