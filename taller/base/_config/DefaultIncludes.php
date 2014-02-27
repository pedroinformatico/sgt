<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/base/_config/Profiles.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/SessionManager.class.php';
require_once $_SESSION['__BASESERVER__'].'/base/_config/SessionValues.php';

?>