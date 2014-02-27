<?
require_once $GLOBALS['__BASESERVER__'].'/taller/base/_config/Profiles.php';
require_once $GLOBALS['__BASESERVER__'].'/taller/base/lib/SessionManager.class.php';
require_once $GLOBALS['__BASESERVER__'].'/taller/base/_config/SessionValues.php';

$profiles = Profiles::getInstance();
$SM = SessionManager::getInstance("default");
$modules = $profiles->profilesArray[$SM->getVars(SessionValues::ID_ROLE)];
?>
<ul id="main_nav">
    <? for ($i = 0; $i < count($modules); $i++) {
        if ($modules[$i]["onMenu"]) {
            ?>
            <li><a id="menu_<? echo $modules[$i]["id"] ?>" href="index.php?module=<? echo $modules[$i]["id"] ?>" ><span><? echo $modules[$i]["desc"] ?></span></a></li>

        <? }
    } ?>
</ul>