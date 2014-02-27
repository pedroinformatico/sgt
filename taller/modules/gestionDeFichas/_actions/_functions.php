<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';

//validate("resumen");

function insertFicha($idCliente,$idAuto,$kilometraje){
    $sql = "INSERT INTO ficha (idCliente,idAuto,kilometraje,fechaRegistro)
            VALUES ({$idCliente},{$idAuto},{$kilometraje}, curdate());";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

function insertarNota($descripcion,$fechaNota){
    $sql = "INSERT INTO nota (descripcion,fechaNota,fechaRegistro)
            VALUES ('{$descripcion}','{$fechaNota}',curdate());";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

function actualizarNota($descripcion,$fechaNota, $idNota){
    $sql = "UPDATE nota SET 
            descripcion = '{$descripcion}',
            fechaNota = '{$fechaNota}'
            WHERE idNota = {$idNota};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    $db->alter();
}



?>
