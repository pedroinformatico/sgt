<?php

require_once $GLOBALS['__BASESERVER__'] . '/taller/modules/login/_actions/_validateUserPermissions.php';
require_once $GLOBALS['__BASESERVER__'] . '/taller/base/lib/SessionManager.class.php';
require_once $GLOBALS['__BASESERVER__'] . '/taller/base/lib/MySQL.php';
require_once $GLOBALS['__BASESERVER__'] . '/taller/base/_config/SessionValues.php';

function obtenerRegiones() {
    $sql = "SELECT idRegion, nombre FROM par_region";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}

function obtenerCliente($idCliente) {
    $sql = "SELECT 
            idCliente,nombres,apellidos,run,correo,calle,poblacion,depto,numeroDomicilio,telefonoCelular,telefonoFijo,idComuna
            FROM cliente
            WHERE idCliente = {$idCliente};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObject();
}

function actualizarCliente($nombres, $apellidos, $run, $correo, $calle, $poblacion, $depto, $numeroDomicilio, $telefonoCelular, $telefonoFijo, $idComuna, $idCliente) {
    $sql = "UPDATE cliente SET 
            nombres = '{$nombres}',
            apellidos = '{$apellidos}',
            run = '{$run}',
            correo = '{$correo}',
            calle = '{$calle}',
            poblacion = '{$poblacion}',
            depto = '{$depto}',
            numeroDomicilio = '{$numeroDomicilio}',
            telefonoCelular = '{$telefonoCelular}',
            telefonoFijo = '{$telefonoFijo}',
            idComuna = {$idComuna}
            WHERE idCliente = {$idCliente};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    $db->alter();
}

function obtenerProvincias($idRegion) {
    $sql = "SELECT idComuna, idRegion, nombre FROM par_comuna WHERE idRegion = {$idRegion}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}

function insertarCliente($nombres, $apellidos, $run, $correo, $calle, $poblacion, $depto, $numeroDomicilio, $telefonoCelular, $telefonoFijo, $idComuna) {
    $sql = "INSERT INTO cliente"
            . "(nombres,apellidos,run,correo,calle,poblacion,depto,numeroDomicilio,telefonoCelular,telefonoFijo,idComuna,fechaRegistro) "
            . "VALUES "
            . "('{$nombres}',"
            . "'{$apellidos}',"
            . "'{$run}',"
            . "'{$correo}',"
            . "'{$calle}',"
            . "'{$poblacion}',"
            . "'{$depto}',"
            . "'{$numeroDomicilio}',"
            . "'{$telefonoCelular}',"
            . "'{$telefonoFijo}',"
            . " {$idComuna}, "
            . " curdate())";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

?>
