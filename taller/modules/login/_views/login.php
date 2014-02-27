<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SESSION['__BASESERVER__'].'/modules/login/_actions/_validateUserPermissions.php';
redirecIsLog();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <!--============================Head============================-->
    <? include '../base/head.php'; ?>
    <!--End Head-->

    <!--============================Begin Body============================-->
    <body id="login_page">

        <!--Wrapper of 450px-->
        <div class="wrapper content">

            <div class="box">
                <!--Begin Login Header-->
                <div class="header">
                    <p><img src="../base/images/half_width_icon.png" alt="Half Width Box" width="30" height="30" />Login Panel</p>
                </div>
                <!--End Login Header-->
                <div class="body">
                    <form>
                        <p>
                            <label>Usuario:</label>
                            <input id="user" type="text" class="textfield large"/>
                        </p>
                        <p>
                            <label>Contraseña:</label>
                            <input id="pass" type="password" class="textfield large"/>
                        </p>
                        <p>
                            <input id="login" type="button" class="button2" value="Login" />
                        </p>
                    </form>
                </div>
            </div>
            <div class="error" id="errorMsg">
                <strong><img src="../base/images/iinfo_icon.png" alt="Information" width="28" height="29" class="icon" /></strong><p id="msg">Usuario incorrecto</p>
            </div>
        </div>
        <!--End Wrapper-->
        <script type="text/javascript" src="./login/js/login.class.js"></script> <!--Import jquery library and jquery tools from a single file-->
    </body>
    <!--End Body-->
</html>