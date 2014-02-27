<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <!--============================Head============================-->

    <? include "../base/head.php"; ?>
    <!--End Head-->

    <!--============================Body============================-->
    <body>

        <? include '../base/header.php'; ?>
        

        <!--============================ Template Content Background ============================-->
        <div id="content_bg" class="clearfix">
            <div class="content wrapper clearfix">
                <div class="sidebar">
                    <div class="small_box">
                        <div class="header">
                            <img src="../base/images/users_icon.png" alt="" width="24" height="24"> Crear
                        </div>
                        <div class="body">
                            <input  type="submit" class="button2" id="nuevoCliente" value="Nuevo cliente">
                        </div>
                    </div>
                </div>
                <div class="main_column">
                    <div class="small_box expose">
                        <!--Begin Box-->
                        <div class="header">
                            <img src="../base/images/users_icon.png" alt="" width="24" height="24"> Buscar cliente
                        </div>
                        <div class="body">
                            <table>
                                <tr>
                                    <td><input type="text" placeholder="Nombre" id="nombreBusqueda"/></td>
                                    <td><input type="text" placeholder="Apellido" id="apellidoBusqueda"/></td>
                                    <td><input type="text"placeholder="RUN" id="runBusqueda"/></td>
                                    <td><input type="text"placeholder="Patente" id="patenteBusqueda"/></td>
                                    <td><input  type="submit" class="button2" id="buscar" value="Buscar"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="small_box clear">
                    <div class="header">
                        <img src="../base/images/tables_icon.png" alt="Accordion" width="30" height="30" /> 
                        Ficha cliente -- <span id="subModuleName"> Vehiculos </span>
                    </div>
                    <div class="body_vertical_nav clearfix">
                        <!-- Grey backgound applied to box body -->
                        <!-- Vertical nav -->
                        <ul class="vertical_nav">
                            <li  class="active"><a href="#">Vehiculos</a></li>
                            <li><a href="#">Datos Personales</a></li>
                        </ul>
                        <div class="main_column">
                            <div class="panes_vertical">
                                <? include './vehiculos/_views/_vehiculos.php'; ?>
                                <? include './datosPersonales/_views/_datosPersonales.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Template Content bacground-->
        <? include './datosPersonales/_views/_nuevoCliente.php'; ?>
        <? include './datosPersonales/_views/_resultadoBusqueda.php'; ?>
        <? include '../base/footer.php'; ?>
        <script type="text/javascript" src="./gestionDeFichas/js/gestion.class.js"></script> <!--Import jquery library and jquery tools from a single file-->
    </body>
    <!--End Body-->
</html>