<?php

require_once './_functions.php';
require_once $_SESSION['__BASESERVER__'].'/pacientes/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/pacientes/base/_config/SessionValues.php';

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
