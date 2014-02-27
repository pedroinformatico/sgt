<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/base/_config/DefaultIncludes.php';
require_once $_SESSION['__BASESERVER__'].'/base/lib/MySQL.php';

function validate($module) {
    $profiles = Profiles::getInstance();
    $SM = SessionManager::getInstance("default");
    if (isLogin()) {
        $modules = $profiles->profilesArray[$SM->getVars(SessionValues::ID_ROLE)];
        for ($i = 0; $i < count($modules); $i++) {
            if ($modules[$i]["id"] == $module) {
                return true;
            }
        }
        header("Location: ../../../index.php?module=login");
    } else {
        header("Location: ../../../index.php?module=login");
    }
}

function isLogin() {
    $SM = SessionManager::getInstance("default");
    $vars = $SM->getVars();
    array_filter($vars);
    if (!empty($vars)) {
        return true;
    }
    return false;
}

function login($user, $pass) {
    $loginOk = false;
    $SM = SessionManager::getInstance("default");
    //comentar este codigo para evitar problemas de seguridad
    if ($user == "admin" && $pass == "admin") {
        $SM->registerSession(100000, [
            SessionValues::ID_USER => 0,
            SessionValues::USER_NAME => "administrador",
            SessionValues::ID_ROLE=> "Administrador"]);
        $loginOk = true;
        return ["status" => "ok", "module" => "gestionDeFichas"];
    } /// Fin if

//    if ($loginOk != true) {
//        $sql = "select id,usuario,rol  from orlandi_usuarios where usuario= '"
//                . mysql_real_escape_string($user) . "' AND clave = '"
//                . mysql_real_escape_string($pass) . "'";
//        $db = MySQL::getInstance();
//        $db->setQuery($sql);
//        $usuario = $db->loadObject();
//        if ($usuario != false) {
//            $SM->registerSession(100000, [
//                SessionValues::ID_USER => $usuario->id,
//                SessionValues::USER_NAME => $usuario->usuario,
//                SessionValues::ID_ROLE => $usuario->rol,
//                SessionValues::ID_ACTUAL_PATIENS => '',
//                SessionValues::ID_ACTUAL_HOUR => ''
//            ]);
//            $loginOk = true;
//            setcookie('SGClinicaLog', sha1(md5($user)) . ";" . sha1(md5($pass)), time() + 7776000, "/");
//            return ["status" => "ok", "module" => "resumen"];
//        } else {
//            $sql = "SELECT ID,NOMBRES,APELLIDOPAT FROM orlandi_profesionales o where USUARIO='"
//                    . mysql_real_escape_string($user) . "' AND PASS = '"
//                    . mysql_real_escape_string($pass) . "'";
//            $db->setQuery($sql);
//            $usuario = $db->loadObject();
//            if ($usuario != false) {
//                $SM->registerSession(100000, [
//                    SessionValues::ID_USER => $usuario->ID,
//                    SessionValues::USER_NAME => $usuario->APELLIDOPAT . " " . $usuario->NOMBRES,
//                    SessionValues::ID_ROLE => "medico",
//                    SessionValues::ID_ACTUAL_PATIENS => '',
//                    SessionValues::ID_ACTUAL_HOUR => ''
//                ]);
//                $loginOk = true;
//                setcookie('SGClinicaLog', sha1(md5($user)) . ";" . sha1(md5($pass)), time() + 7776000, "/");
//                return ["status" => "ok", "module" => "resumen"];
//            }
//        }
//    }

    return ["status" => "error", "msg" => "Usuario o contraseña invalida"];
}

function checkLoginCookie() {
//    $SM = SessionManager::getInstance("default");
//    $data = $_COOKIE["SGClinicaLog"];
//    if ($data <> "") {
//        $data = explode(";", $data);
//        $user = $data[0];
//        $pass = $data[1];
//        $sql = "select id,usuario,rol from orlandi_usuarios where SHA1(md5(usuario))= '"
//                . mysql_real_escape_string($user) . "' AND SHA1(md5(clave)) = '"
//                . mysql_real_escape_string($pass) . "'";
//        $db = MySQL::getInstance();
//        $db->setQuery($sql);
//        $userOject = $db->loadObject();
//        if ($userOject != false) {
//            $SM->registerSession(100000, [
//                SessionValues::ID_USER => $userOject->id,
//                SessionValues::USER_NAME => $userOject->usuario,
//                SessionValues::ID_ROLE => $userOject->rol,
//                SessionValues::ID_ACTUAL_PATIENS => '',
//                SessionValues::ID_ACTUAL_HOUR => ''
//            ]);
//            return true;
//        } else {
//            $sql = "SELECT ID,NOMBRES,APELLIDOPAT FROM orlandi_profesionales o where SHA1(md5(USUARIO))='"
//                    . mysql_real_escape_string($user) . "') AND (SHA1(md5(PASS)) = '"
//                    . mysql_real_escape_string($pass) . "')";
//            $db->setQuery($sql);
//            $usuario = $db->loadObject();
//            if ($usuario != false) {
//                $SM->registerSession(100000, [
//                    SessionValues::ID_USER => $usuario->ID,
//                    SessionValues::USER_NAME => $usuario->APELLIDOPAT . " " . $usuario->NOMBRES,
//                    SessionValues::ID_ROLE => "medico",
//                    SessionValues::ID_ACTUAL_PATIENS => '',
//                    SessionValues::ID_ACTUAL_HOUR => ''
//                ]);
//                return true;
//            }
//        }
//    }
    return true;
}

function redirecIsLog() {
    if (isLogin())
        header("Location: index.php?module=gestionDeFichas");
}

function logOut() {
    $SM = SessionManager::getInstance("default");
    $SM->destroySession();
    //setcookie('SGClinicaLog', "", time() + 7776000, "/");
    return ["status" => "ok", "module" => "login"];
}

?>
