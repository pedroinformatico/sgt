<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/vehiculos/_actions/_functions.php';
echo json_encode(obtenerMarcas());
?>
