<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/pacientes/modules/login/_actions/_validateUserPermissions.php';
echo json_encode(logOut());
?>
