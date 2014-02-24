<?php

$base= explode(  $_SERVER['DOCUMENT_ROOT'],__FILE__);
$base= explode("/taller",$base[1] );
require_once $_SERVER['DOCUMENT_ROOT'].$base[0].'/taller/modules/login/_actions/_validateUserPermissions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $base[0] . '/taller/base/lib/SessionManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].$base[0].'/taller/base/lib/MySQL.php';
require_once $_SERVER['DOCUMENT_ROOT'].$base[0].'/taller/base/_config/SessionValues.php';

//validate("resumen");



?>
