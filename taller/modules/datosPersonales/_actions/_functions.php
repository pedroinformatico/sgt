<?php

$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode("/pacientes", $base[1]);
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/modules/login/_actions/_validateUserPermissions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/base/lib/SessionManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/base/lib/MySQL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/base/_config/SessionValues.php';

//validate("resumen");

function getPatiensByIdOrRut($id, $Rut) {
    $sql = "SELECT
    op.ID,
    op.RUT,
    op.NOMBRES,
    op.APELLIDOPAT,
    op.APELLIDOMAT,
    op.FECHANAC,
    op.ESTADOCIVIL,
    op.PREVISION,
    op.CORREO,
    YEAR(CURDATE())-YEAR(op.FECHANAC)  AS EDAD
    FROM orlandi_pacientes op
    WHERE  ";
    if ($id != "") {
        $sql .= "op.ID = {$id} ";
    } else {
        $sql .= "op.RUT = '{$Rut}'";
    }
    $db = MySQL::getInstance();
    $db->setQuery($sql);
    return $db->loadObject();
}

?>
