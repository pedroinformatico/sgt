<?php

$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode("/taller", $base[1]);
$GLOBALS['__BASESERVER__']=$_SERVER['DOCUMENT_ROOT'] . $base[0] ;
require_once $GLOBALS['__BASESERVER__'].'/taller/base/_config/DefaultIncludes.php';

if (isset($_REQUEST['module'])) {
    $module = $_REQUEST['module'];
    $profiles = Profiles::getInstance();
    $SM = SessionManager::getInstance("default");
    $modules = $profiles->profilesArray[$SM->getVars(SessionValues::ID_ROLE)];
    for ($i = 0; $i < count($modules); $i++) {
        if ($modules[$i]["id"] == $module) {
            include $modules[$i]["url"];
            return;
        }
    }
}

include './login/_views/login.php';
?>
