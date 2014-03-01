<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';

//validate("resumen");

function obtenerVisitasPorIdAuto($idAuto){
    $sql = "SELECT
            f.idVisita,
            f.idCliente,
            f.idAuto,
            f.kilometraje,
            f.descripcion,
            f.fechaIngreso,
            f.fechaRegistro
            FROM visita AS f  WHERE  f.idAuto = {$idAuto}";
    error_log($sql);
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}


function insertarVisita($idCliente,$idAuto,$kilometraje, $fechaIngreso, $descripcion){
    $sql = "INSERT INTO visita (idCliente,idAuto,kilometraje,fechaRegistro,  fechaIngreso, descripcion)
            VALUES ({$idCliente},{$idAuto},{$kilometraje}, curdate(), '{$fechaIngreso}','{$descripcion}');";
    error_log($sql);        
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

function relacionarVisitaConNota($idVisita,$idNota){
    $sql = "INSERT INTO visita_nota (idVisita, idNota) VALUES ({$idVisita},{$idNota})";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

// ;

function actualizarNota($descripcion,$fechaNota, $idNota){
    $sql = "UPDATE nota SET 
            descripcion = '{$descripcion}',
            fechaNota = '{$fechaNota}'
            WHERE idNota = {$idNota};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    $db->alter();
}

function obtenerNotasPorVisita($idVisita){
    $sql = "SELECT n.descripcion, n.fechaRegistro, n.idNota FROM 
            visita_nota AS fn
            INNER JOIN nota AS n ON n.idNota = fn.idNota
            WHERE fn.idVisita = {$idVisita}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}


?>
