<?php

require_once './_functions.php';
$base = split($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = split("/pacientes", $base[1]);
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/base/lib/SessionManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/pacientes/base/_config/SessionValues.php';

$session = SessionManager::getInstance(SessionValues::SESSION_DEFAULT);

if ($session->getVars(SessionValues::ID_SEARCH_PATIENS) != "") {
    echo json_encode(getPatiensByIdOrRut($session->getVars(SessionValues::ID_SEARCH_PATIENS), ""));
}

if ($session->getVars(SessionValues::ID_ACTUAL_PATIENS) != "") {
    $patien = getPatiensByIdOrRut($session->getVars(SessionValues::ID_ACTUAL_PATIENS), "");
    $session->registerVars(false, [SessionValues::ID_SEARCH_PATIENS => $patien->ID]);
    echo json_encode($patien);
}
?>
