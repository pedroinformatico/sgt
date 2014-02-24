<?php

$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode("/taller", $base[1]);
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/taller/base/_config/Profiles.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/taller/base/lib/SessionManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/taller/base/_config/SessionValues.php';

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
