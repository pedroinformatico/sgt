<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';

//validate("resumen");

function obtenerFichasPorIdAuto($idAuto){
    $sql = "SELECT
            f.idFicha,
            f.idCliente,
            f.idAuto,
            f.kilometraje,
            f.descripcion,
            f.fechaIngreso,
            f.fechaRegistro
            FROM ficha AS f  WHERE  f.idAuto = {$idAuto}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}


function insertFicha($idCliente,$idAuto,$kilometraje, $fechaIngreso, $descripcion){
    $sql = "INSERT INTO ficha (idCliente,idAuto,kilometraje,fechaRegistro,  fechaIngreso, descripcion)
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

function relacionarFichaConNota($idFicha,$idNota){
    $sql = "INSERT INTO ficha_nota (idFicha, idNota) VALUES ({$idFicha},{$idNota})";
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

function obtenerNotasPorFicha($idFicha){
    $sql = "SELECT n.descripcion, n.fechaRegistro, n.idNota FROM 
            ficha_nota AS fn
            INNER JOIN nota AS n ON n.idNota = fn.idNota
            WHERE fn.idFicha = {$idFicha}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}


?>
