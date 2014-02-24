<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <!--============================Head============================-->

    <? include  "../base/head.php"; ?>
    <!--End Head-->

    <!--============================Body============================-->
    <body>

        <? include '../base/header.php'; ?>

        <!--============================ Template Content Background ============================-->
        <div id="content_bg" class="clearfix">
            <div class="content wrapper clearfix">
                <div class="box column-left">
                    <!--Begin Box-->
                    <div class="header">
                        <p>Paciente Actual</p>
                    </div>
                    <div class="body">
                        <table>  
                            <tr style="margin: 0px;">
                                <td style="margin: 0px; padding: 0px"><p class="descripcion">Rut :</p></td>
                                <td style="margin: 0px; padding: 0px"><p class="detalle" id="runPatien"> </p></td>
                            </tr>
                            <tr style="margin: 0px;">
                                <td style="margin: 0px; padding: 0px"><p class="descripcion">Nombre :</p></td>
                                <td style="margin: 0px; padding: 0px"><p class="detalle" id="namePatien"> </p></td>
                            </tr>
                            <tr style="margin: 0px;">
                                <td style="margin: 0px; padding: 0px"><p class="descripcion">Apellido :</p></td>
                                <td style="margin: 0px; padding: 0px"><p class="detalle" id="lastNamePatien"> </p></td>
                            </tr>
                            <tr style="margin: 0px;">
                                <td style="margin: 0px; padding: 0px"><p class="descripcion">Hora Atencion :</p></td>
                                <td style="margin: 0px; padding: 0px"><p class="detalle" id="hourPatien"> </p></td>
                            </tr>
                            <tr style="margin: 0px; padding: 0px">
                               <!-- <td colspan="2" style="margin: 0px; padding: 0px"><a href="#" style="font-size: 18px">Ver Ficha</a></td>-->
                                <td>
                                    <input name="button2" type="button" class="button2 divCenter" id="btnAtendido" value="Atendido" />
                                </td>
                            </tr>
                        </table>
                    </div>



                </div>
                <!--=========Container for Box on the Right=========-->
                <div class="box column-right">
                    <!--Begin Box-->
                    <div class="header">
                        <p>Pacientes en Espera</p>
                    </div>
                    <div class="body">
                        <table id="tablePatiensInWaiting" border="0" cellpadding="0" cellspacing="0" class="grid_table wf">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="info">
                            <strong>Ultima actualizacion:</strong> <label id="hourUpdatetablePatiensInWaiting"></label> <a id="updatetablePatiensInWaiting" style="cursor: pointer"> Actualizacion manualmente.</a>
                        </div>
                    </div>
                </div>
                <div class="box clear">
                    <!--Begin Box-->
                    <div class="header">
                        <p>Pacientes para Hoy</p>
                    </div>
                    <div class="body">
                        <table id="tablePatiensForNow" border="0" cellpadding="0" cellspacing="0" class="grid_table wf">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                        <div class="info">
                            <strong>Ultima actualizacion:</strong><label id="hourUpdatetablePatiensForNow"></label> <a  id="updatetablePatiensForNow" style="cursor: pointer"> Actualizacion manualmente.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Template Content bacground-->
        <? include '../base/footer.php'; ?>
        <script type="text/javascript" src="./resumen/js/gestion.class.js"></script> <!--Import jquery library and jquery tools from a single file-->
    </body>
    <!--End Body-->
</html>