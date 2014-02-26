<?
require_once $GLOBALS['__BASESERVER__'].'/taller/base/_config/DefaultIncludes.php';
$SM = SessionManager::getInstance("default");
$user = $SM->getVars(SessionValues::USER_NAME);
$rol = $SM->getVars(SessionValues::ID_ROLE);
/*
  if(isset($SM->getVars("patient"))){ //todo: terminar validaciòn de sesion
  echo '<input type="hidden" value="'.$SM->getVars("patient").'"/>';
  } */
?>
<!--==================== Header =======================-->
<div id="header_bg">

    <!--============Header Wrapper============-->
    <div class="wrapper">

        <!--=======Top Header area======-->
        <div id="header_top">
            <span class="fr"><a href="#" id="newPass">Nueva contraseña</a> <a href="#" id="logout">Logout</a></span> <!--Float links to left-->
            Hola <? echo $user; ?>, tu estas logeado como <? echo $rol; ?>
        </div>
        <!--End Header top Area=-->

        <!--=========Header Area including search field and logo=========-->
        <div class="header_main clearfix">

            <!--===Search field===-->
            <!--                    <div class="header_search">
                                    <a href="#"><img src="images/search_icon.png" alt="Search" width="21" height="20" class="search_icon" /></a>
                                    <input name="textfield" type="text"  id="textfield" class="search_field" />
                                </div>-->

            <!--===Logo===-->
            <a id="logo" href="#">Clinica Orlandi</a>

        </div>
        <!--End Search field and logo Header Area-->

        <? include '../base/menu.php'; ?>

    </div>
    <!--End Wrapper-->
</div>
<script type="text/javascript" src="./login/js/header.class.js"></script>
<!--End Header-->