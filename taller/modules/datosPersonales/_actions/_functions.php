<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'] . '/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'] . '/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'] . '/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'] . '/base/_config/SessionValues.php';

function obtenerClientesSegunParametros($nombre, $apellidos, $run, $patente) {
    $nombre = $nombre == "" ? "NULL" : "'%".$nombre."%'";
    $apellidos = $apellidos == "" ? "NULL" : "'%".$apellidos."%'";
    $run = $run == "" ? "NULL" : "'%".$run."%'";

    $sql = "SELECT DISTINCT
            UPPER(c.nombres) AS nombre, 
            UPPER(c.apellidos) AS apellido,
            c.run,
            c.idCliente
            FROM 
            cliente as c
            left JOIN cliente_auto AS ca ON ca.idCliente = c.idCliente
            left JOIN auto AS a ON a.idAuto = ca.idAuto 
            WHERE
            UPPER(c.nombres) like UPPER(IFNULL({$nombre},c.nombres)) AND
            UPPER(c.apellidos) like UPPER(IFNULL({$apellidos},c.apellidos)) AND
            UPPER(c.run) like UPPER(IFNULL({$run},c.run))";
    if ($patente != null && !empty($patente)) {
        $sql .= "AND UPPER(a.patente) =  UPPER({$patente})";
    }
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

function obtenerClientePorRun($run) {
    $sql = "SELECT      
            c.idCliente,c.nombres,c.apellidos,c.run,c.correo,
            c.calle,c.poblacion,c.depto,c.numeroDomicilio,
            c.telefonoCelular,c.telefonoFijo,c.idComuna, pc.idRegion
            FROM cliente AS c
            INNER JOIN par_comuna AS pc ON pc.idComuna = c.idComuna 
            WHERE c.run = '{$run}';";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObject();
}

function actualizarCliente($nombres, $apellidos, $run, $correo, $calle, $poblacion, $depto, $numeroDomicilio, $telefonoCelular, $telefonoFijo, $idComuna) {
    $sql = "UPDATE cliente SET 
            nombres = '{$nombres}',
            apellidos = '{$apellidos}',
            correo = '{$correo}',
            calle = '{$calle}',
            poblacion = '{$poblacion}',
            depto = '{$depto}',
            numeroDomicilio = '{$numeroDomicilio}',
            telefonoCelular = '{$telefonoCelular}',
            telefonoFijo = '{$telefonoFijo}',
            idComuna = {$idComuna}
            WHERE run = '{$run}';";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    $db->alter();
}

function obtenerComunas($idRegion) {
    $sql = "SELECT idComuna, idRegion, nombre FROM par_comuna WHERE idRegion = {$idRegion}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}

function obtenerRegiones(){
    $sql = "SELECT 
            idRegion, nombre
            FROM par_region";
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
