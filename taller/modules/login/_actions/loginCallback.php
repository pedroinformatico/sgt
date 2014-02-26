<?php

$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode("/taller", $base[1]);
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/taller/modules/login/_actions/_validateUserPermissions.php';
echo json_encode(login($_REQUEST["user"], $_REQUEST["pass"]));
?>
