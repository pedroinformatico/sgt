<?php

class SessionManager {
    /** Ambito de la sesion, por ejemplo 'frontend', 'cpan', 'area1', etc. La idea es poder manejar distintas
    areas de logueo simultaneamente */
    private $ambito;
    private $expired = false;

    
    private static $_singleton;

    public static function getInstance($ambito) {
        if (is_null(self::$_singleton)) {
            self::$_singleton = new SessionManager($ambito);
        }
        return self::$_singleton;
    }
    
    private function __construct($ambito = 'default') {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->ambito = $ambito;
    }


    /**
     * registerSession
     * Registra una sesion de usuario logueado.
     *
     * @param Integer $maxTime  [opcional] Tiempo de expiracion de la sesion, en segundos, desde AppConfig
     * @param array  $varsArray [opcional] Array asociativo con variables a almacenar en la sesion
     * @return void
     */
    public function registerSession($maxTime = 6000000, $varsArray = array()) {

        //error_log(print_r($varsArray,true));
        if (count($varsArray) >= 1) {
            foreach ($varsArray as $name => $value) {
                $_SESSION[$this->ambito][$name] = $value;
            };
        };
        $_SESSION[$this->ambito]['_maxInactiveTime_'] = $maxTime; // Segundos luego de los cuales expirara la sesion
        $_SESSION[$this->ambito]['_creada_'] = true;
        $_SESSION[$this->ambito]['_lastAction_'] = date('Y-m-j H:i:s'); // antes Y-n-j, mes: 6 => 06

        //error_log($this->ambito);
        //error_log(print_r($_SESSION[$this->ambito],true));
    }


    /**
     * Agrega variables a la sesion actual, siempre que haya sido creada previamente
     * con registerSession
     *
     * @param Boolean $crypted [opcional] Permite especificar que los valores se almavenen encriptados
     * @param Array  $varsArray [opcional] Array asociativo con variables a almacenar en la sesion
     * @return void
     */
    public function registerVars($crypted = false, $varsArray = array()) {

        if ($this->validSession()) {
            if (count($varsArray) >= 1) {
                foreach ($varsArray as $name => $value) {
                    if ($crypted) {
                        $value = md5($value);
                    };
                    $_SESSION[$this->ambito][$name] = $value;
                };
            };
        };
    }


    /**
     * getVars()
     * Retorna arreglo con variables de la sesion.
     * Si se especifica el nombre de una variable, devuelve solo esta.
     *
     * @param string $nameVar (opc) nombre de la variable
     * @return array o string dependiendo de la entrada
     */
    public function getVars($nameVar = '') {

        if ($this->validSession()) {
            if ($nameVar) {
                // Una var en particular
                return $_SESSION[$this->ambito][$nameVar];
            } else {
                // Un array con todas las vars
                return $_SESSION[$this->ambito];
            };
        } else {
            return array();
        };
    }

    /**
     * Valida si existe sesion de usuario, en el ambito declarado al hacer el new()
     * Si la sesion es valida, la refresca.
     *
     * @return boolean dependiendo del resultado
     */
    public function validSession() {

        if (!isset($_SESSION[$this->ambito]['_creada_'])) {
            return false;
        } else {
            // Si es valida, ver si no ha expirado.
            $ahora = date('Y-n-j H:i:s');
            $dif = (strtotime($ahora) - strtotime($_SESSION[$this->ambito]['_lastAction_']));
            // error_log("sesion existente (chequear tiempo)\n ahora: $ahora , time_ahora: " . strtotime($ahora) . "\nlastAction:" . $_SESSION[$this->ambito]['_lastAction_'] . ' , time_lastAction: ' . strtotime($_SESSION[$this->ambito]['_lastAction_']) . "\nDifSecs: $dif");

            if ($dif >= $_SESSION[$this->ambito]['_maxInactiveTime_']) {
                $this->expired = true; // para chequear esta condicion desde fuera en caso de que ret false
                // error_log("sesion expirada, dif: $dif ");
                return false; // sesion ha expirado

            } else {
                $_SESSION[$this->ambito]['_lastAction_'] = $ahora; // renueva
                // error_log("sesion ok, renovando con, ahora: $ahora ");
                return true;
            }
        }
    }

    /**
     * Retorna valor de la var expired.
     *
     * @return boolean valor del atributo expired.
     */
    public function expiredSession() {

        return $this->expired;
    }

    /**
     * Destruye sesion del ambito actual.
     * @return noiv
     */
    public function destroySession() {
        unset($_SESSION[$this->ambito]);
    }
}
?>