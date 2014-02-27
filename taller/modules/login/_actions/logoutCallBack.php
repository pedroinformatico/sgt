<?php

require_once $GLOBALS['__BASESERVER__'].'/taller/modules/login/_actions/_validateUserPermissions.php';
echo json_encode(logOut());
?>
