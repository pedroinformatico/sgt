<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/datosPersonales/_actions/_functions.php';

$run = isset($_REQUEST["run"]) ? $_REQUEST["run"] : "";

echo json_encode(obtenerClientePorRun($run));

?>
