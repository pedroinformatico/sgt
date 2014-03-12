
<div id="dialogResumenVisita">
    <div id="contenido">
        <fieldset>
            <legend>Datos Personales</legend>
            <table>
                <tr>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>RUN</td>
                    <td>Correo</td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Calle</td>
                    <td>Población</td>
                    <td>Número Domicilio</td>
                    <td>Dpto/Block/Otros</td>                            
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Teléfono Celular</td>
                    <td>Teléfono Fijo</td>
                    <td>Región</td>
                    <td>Comuna</td>                            
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Información del vehículo</legend>
            <table>
                <tr>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Patente</td>
                </tr>
                <tr> 
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Año</td>
                    <td>Kilometraje</td>
                    <td>VIN</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Detalle Visita</legend>
            <table>
                <tr>
                    <td>Kilometraje</td>
                    <td>Fecha Ingreso</td>
                    <td>OT</td>
                </tr>   
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">Descripción</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
            </table>
            <p id="imprimirNotas"> </p>
        </fieldset>
    </div>
</div>
<iframe  id="printeriframe" src="../base/printContent.php" style="position:absolute;left:0;top:-1000px"></iframe>
<script type="text/javascript" src="./vehiculos/js/visitaImprimir.class.js"></script>