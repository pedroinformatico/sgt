<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';


function obtenerDatosVisitaImprimir($idVisita){
    $sql = "SELECT 
            v.*,
            c.*,
            a.*,
            v.kilometraje kilometrosVisita,
            a.kilometraje kilometrosInicio,
            pc.nombre nombreComuna,
            pr.nombre nombreRegion,
            pm.nombre nombreMarca
            FROM visita AS v
            INNER JOIN cliente AS c ON c.idCliente = v.idCliente
            INNER JOIN auto AS a ON a.idAuto = v.idAuto
            INNER JOIN par_comuna pc ON pc.idComuna = c.idComuna
            INNER JOIN par_region pr ON pr.idRegion = pc.idRegion
            INNER JOIN par_marca pm ON pm.idMarca = a.marca
            WHERE v.idVisita = {$idVisita}";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObject();
}

function relacionarClienteAuto($idAuto, $idCliente){
    $sql = "INSERT INTO cliente_auto (idAuto,idCliente) 
            VALUES ({$idAuto},{$idCliente});";
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->insert(); //Retorna id del insert
}

function obtenerPatentesPorCliente($idCliente){
    $sql = "SELECT pm.nombre as marca, a.modelo, a.patente, a.idAuto 
            FROM cliente_auto AS ca 
            INNER JOIN auto AS a ON a.idAuto = ca.idAuto
            INNER JOIN par_marca AS pm ON a.marca = pm.idMarca
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
