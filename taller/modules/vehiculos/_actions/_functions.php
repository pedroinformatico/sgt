<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';


function obtenerPatentesPorCliente($idCliente){
    $sql = "SELECT a.patente, a.idAuto 
            FROM cliente_auto AS ca 
            INNER JOIN auto AS a ON a.idAuto = ca.idAuto
            WHERE ca.idCliente = {$idCliente};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}

function obtenerMarcas(){
    
    $sql = "SELECT idMarca, nombre FROM par_marca;";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObjectList();
}

function obtenerVehiculoSegunId($idVehiculo){
    $sql = "SELECT 
            idAuto,marca,modelo,patente,anio,kilometraje,vin
            FROM auto
            WHERE idAuto = {$idVehiculo};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObject();
}

function insertarVehiculo($marca,$modelo,$patente,$anio,$kilometraje,$vin){
    $sql = "INSERT INTO auto (marca,modelo,patente,anio,kilometraje,vin) 
            VALUES ({$marca},'{$modelo}','{$patente}',{$anio}, {$kilometraje},'{$vin}');";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

function actualizarVehiculo($marca,$modelo,$patente,$anio,$kilometraje,$vin, $idAuto){
    $sql = "UPDATE auto SET
            marca = {$marca},
            modelo = '{$modelo}',
            patente = '{$patente}',
            anio = {$anio},
            kilometraje = {$kilometraje},
            vin = '{$vin}'
            WHERE idAuto = {$idAuto};";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    $db->alter();
}


?>
