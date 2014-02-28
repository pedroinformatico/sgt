<div id="dialogNuevoVehiculo" title="Agregar nuevo vehiculo">
    <table>
        <tr>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Patente</td>
        </tr>
        <tr> 
            <td><select id="nvMarca"><option>-- Seleccione --</option></select></td>
            <td><input id="nvModelo" type="text"/></td>
            <td><input id="nvPatente" type="text"/></td>
        </tr>
        <tr>
            <td>Año</td>
            <td>Kilometraje</td>
            <td>VIN</td>
        </tr>
        <tr>
            <td><input id="nvAnio" type="text"/></td>
            <td><input id="nvKilometraje" type="text"/></td>
            <td><input id="nvVIN" type="text"/></td>
        </tr>
        <tr>
            <td><input  type="submit" class="button2" id="guardarNuevoVehiculo" value="guardar"></td>
            <td colspan="2"></td>
        </tr>
    </table>
</div>


<script type="text/javascript" src="./vehiculos/js/nuevoVehiculo.class.js"></script>