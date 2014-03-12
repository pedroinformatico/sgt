
<div id="dialogResumenVisita">
    <div id="contenido">
        
        <div>
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%">
                        <div>
                            <img src="/taller/base/images/logo.png"/>
                            <center> Atienzo Automotriz <br/>
                            Dirección: Calle Hevia #0115 Paradero 30 1/2 Quilpué <br/>
                            <a href="http://www.atienzoautomotriz.cl">www.atienzoautomotriz.cl</a></center>
                        </div>
                    </td>
                    <td>
                        <div style="float: right">
                            <label>Orden de Trabajo</label> <br/>
                            <input id="imprimirOT" type="text" disabled="disabled"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <fieldset>
            <legend>Datos Personales</legend>
            <table style="width: 100%">
                <tr>
                    <td><b>Nombre</b></td>
                    <td>Apellidos</td>
                    <td>RUN</td>
                    <td>Correo</td>

                </tr>
                <tr>
                    <td><label id="imprimirNombre" class="labelImprimir"></label></td>
                    <td><label id="imprimirApellido" class="labelImprimir"/></td>
                <td><label id="imprimirRUN" class="labelImprimir"/></td>
                <td><label id="imprimirCorreo" class="labelImprimir"/></td>
                </tr>
                <tr>
                    <td>Calle</td>
                    <td>Población</td>
                    <td>Número Domicilio</td>
                    <td>Dpto/Block/Otros</td>                            
                </tr>
                <tr>
                    <td><label id="imprimirCalle" class="labelImprimir"/></td>
                <td><label id="imprimirPoblacion" class="labelImprimir"/></td>
                <td><label id="imprimirNumeroDomicilio" class="labelImprimir"/></td>
                <td><label id="imprimirDptoBlock" class="labelImprimir"/></td>
                </tr>
                <tr>
                    <td>Teléfono Celular</td>
                    <td>Teléfono Fijo</td>
                    <td>Región</td>
                    <td>Comuna</td>                            
                </tr>
                <tr>
                    <td><label id="imprimirTelefonoCelular"/></td>
                <td><label id="imprimirTelefonoFijo"/></td>
                <td><label id="ImprimirRegion"/></td>
                <td><label id="imprimirComuna"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Información del vehículo</legend>
            <table style="width: 100%">
                <tr>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Patente</td>
                </tr>
                <tr> 
                    <td><label id="imprimirMarca"/></td>
                <td><label id="imprimirModelo"/></td>
                <td><label id="imprimirPatente"/></td>
                </tr>
                <tr>
                    <td>Año</td>
                    <td>Kilometraje</td>
                    <td>VIN</td>
                </tr>
                <tr>
                    <td><label id="imprimirAnio"/></td>
                <td><label id="imprimirKilometrajeInicio"/></td>
                <td><label id="imprimirVIN"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Detalle Visita</legend>
            <table style="width: 100%">
                <tr>
                    <td>Kilometraje</td>
                    <td>Fecha Ingreso</td>
                    <td>OT</td>
                </tr>   
                <tr>
                    <td><label id="imprimirKilometrajeVisita"/></td>
                <td><label id="imprimirFechaIngreso"/></td>
                <td><label /></td>
                </tr>
                <tr>
                    <td colspan="3">Descripción</td>
                </tr>
                <tr>
                    <td colspan="3"><labe id="imprimirDescripcion"/></td>
                </tr>
            </table>
            <p id="imprimirNotas"> </p>
        </fieldset>
    </div>
</div>
<iframe  id="printeriframe" src="../base/printContent.php" style="position:absolute;left:0;top:-1000px"></iframe>
<script type="text/javascript" src="./vehiculos/js/visitaImprimir.class.js"></script>