<div id="dialogNuevoCliente" title="Agregar nuevo cliente">
    <table>
        <tr>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>RUN</td>
            <td>Correo</td>

        </tr>
        <tr>
            <td><input type="text" id="nuevoNombre"/></td>
            <td><input type="text" id="nuevoApellido"/></td>
            <td><input type="text" id="nuevoRun"/></td>
            <td><input type="text" id="nuevoCorreo"/></td>
        </tr>
        <tr>
            <td>Calle</td>
            <td>Población</td>
            <td>Número Domicilio</td>
            <td>Dpto/Block/Otros</td>                            
        </tr>
        <tr>
            <td><input type="text" id="nuevoCalle"/></td>
            <td><input type="text" id="nuevoPoblacion"/></td>
            <td><input type="text" id="nuevoNumero"/></td>
            <td><input type="text" id="nuevoOtro"/></td>
        </tr>
        <tr>
            <td>Teléfono Celular</td>
            <td>Teléfono Fijo</td>
            <td>Región</td>
            <td>Comuna</td>                            
        </tr>
        <tr>
            <td><input type="text" id="nuevoCelular"/></td>
            <td><input type="text" id="nuevoTelefono"/></td>
            <td> <select id="nuevaRegion"><option>-- Seleccione --</option></select></td>
            <td> <select id="nuevaComuna"><option>-- Seleccione --</option></select></td>
        </tr>
        <tr>
            <td><input  type="submit" class="button2" id="guardarNuevoCliente" value="guardar"></td>
            <td colspan="3" ><span id="errorNuevoCliente" style="color: red"></span></td> 
        </tr>
    </table>
</div>

<script type="text/javascript" src="./datosPersonales/js/nuevoCliente.class.js"></script> <!--Import jquery library and jquery tools from a single file-->