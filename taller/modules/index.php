<?php

if (!isset($_SESSION)) {
    session_start();
}

$aplicationName = "/taller";
$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode($aplicationName, $base[1]);
$_SESSION['__BASESERVER__'] = $_SERVER['DOCUMENT_ROOT'] . $base[0] . $aplicationName;

require_once $_SESSION['__BASESERVER__'] . '/base/_config/DefaultIncludes.php';

if (isset($_REQUEST['module'])) {
    $module = $_REQUEST['module'];
    $profiles = Profiles::getInstance();
    $SM = SessionManager::getInstance("default");
    $modules = @$profiles->profilesArray[@$SM->getVars(SessionValues::ID_ROLE)];
    for ($i = 0; $i < count($modules); $i++) {
        if ($modules[$i]["id"] == $module) {
            include $modules[$i]["url"];
            return;
        }
    }
}

include './login/_views/login.php';
?>
