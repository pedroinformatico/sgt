<?php

class Profiles {

    public $profilesArray;
    private static $_singleton;

    public static function getInstance() {
        if (is_null(self::$_singleton)) {
            self::$_singleton = new Profiles();
        }
        return self::$_singleton;
    }

    private function __construct() {
        $this->profilesArray = array(
            "Administrador" => array(
                array("id" => "gestionDeFichas", "desc" => "Gestion de fichas", "url" => "./gestionDeFichas/_views/gestion.php", "onMenu" => true)
            )
        );
    }

}

?>
