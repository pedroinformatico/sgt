<!-- Pane 1 -->
<div id="visitasVehiculo">
    <fieldset>
        Visitas del Vehiculo 
        <select  id="patentes" >
            <option value="0">Seleccione Vehículo</option>
        </select> 
        <input  type="submit" class="button2" id="nuevoVehiculo" value="Agregar nueva vehiculo">
    </fieldset>
    <br/>
    <fieldset>
        <legend>Historial de visitas</legend>
        <table id="tablaHistorialAutos" border="0" cellpadding="0" cellspacing="0" class="grid_table wf">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>OT</th>
                    <th>Kilometraje</th>
                    <th>Detalle</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <tfoot>
                <tr >
                    <td colspan="6" ><input  type="submit" class="button2" id="nuevaVisita" value="Agregar nueva visita"></td>
                </tr>
            </tfoot>
        </table>
    </fieldset>
    <? include './vehiculos/_views/_nuevoVehiculo.php';?>
    <? include './vehiculos/_views/_nuevaVisita.php';?>
    
</div>

<script type="text/javascript" src="./vehiculos/js/visitas.class.js"></script>
<script type="text/javascript" src="./vehiculos/js/visitaImprimir.class.js"></script>