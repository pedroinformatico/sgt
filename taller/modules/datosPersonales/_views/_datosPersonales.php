<div>
    <!-- Second Pane -->


    <table>
        <tr>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>RUN</td>
            <td>Correo</td>
        </tr>
        <tr>
            <td><input type="text" class="datosClientes" id="nombreClienteActual" /></td>
            <td><input type="text" class="datosClientes" id="apellidoClienteActual"/></td>
            <td><input type="text" readonly id="runClienteActual"/></td>
            <td><input type="text" class="datosClientes" id="correoClienteActual"/></td>
        </tr>
        <tr>
            <td>Calle</td>
            <td>Población</td>
            <td>Número Domicilio</td>
            <td>Dpto/Block/Otros</td>                            
        </tr>
        <tr>
            <td><input type="text" class="datosClientes" id="calleClienteActual"/></td>
            <td><input type="text" class="datosClientes" id="poblacionClienteActual" /></td>
            <td><input type="text" class="datosClientes" id="numeroClienteActual"/></td>
            <td><input type="text" class="datosClientes" id="deptoClienteActual"/></td>
        </tr>
        <tr>
            <td>Teléfono Celular</td>
            <td>Teléfono Fijo</td>
            <td>Región</td>
            <td>Comuna</td>                            
        </tr>
        <tr>
            <td><input type="text" class="datosClientes" id="celularClienteActual"/></td>
            <td><input type="text" class="datosClientes" id="fijoClienteActual"/></td>
            <td> <select class="selectDatosClientes" id="regionClienteActual"><option>-- Seleccione --</option></select></td>
            <td> <select class="selectDatosClientes" id="comunaClienteActual"><option>-- Seleccione --</option></select></td>
        </tr>
        <tr >
            <td><input  type="submit" class="button2" id="editarCliente" value="Editar cliente"><input  type="submit" class="button2" id="guardarEdicionCliente" value="Guardar"></td>
            <td colspan="3" ><span id="errorClienteActual" style="color: red"></span></td> 
        </tr>
    </table>


</div>

<script type="text/javascript" src="./datosPersonales/js/datosPersonales.class.js"></script> <!--Import jquery library and jquery tools from a single file-->