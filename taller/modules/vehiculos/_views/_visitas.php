<!-- Pane 1 -->
<div id="visitasVehiculo">
    <fieldset>
        Notas de la Ficha 
        <select  id="patentes" >
            <option value="xx-xx-nn">Chrevrolet xx-xx-nn</option>
            <option value="xx-yy-nn">Nisan xx-yy-nn</option>
        </select> 
        <input  type="submit" class="button2" id="nuevoVehiculo" value="Agregar nueva vehiculo">
    </fieldset>
    <br/>
    <fieldset>
        <legend>Historial de visitas para <span id="pantenteSeleccionada">xx-xx-nn</span></legend>
        <table border="0" cellpadding="0" cellspacing="0" class="grid_table wf">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Kilometraje</th>
                    <th>Detalle</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>05/05/2013</td>
                    <td>10:34:23</td>
                    <td>100.000</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                    <td><input  type="submit" class="button" id="editar_1" value="Editar" onclick="vehiculos.actions.openEditNotes(1)"></td>
                </tr>
                <tr>
                    <td>05/05/2013</td>
                    <td>10:34:23</td>
                    <td>80.000</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                    <td><input  type="submit" class="button" id="editar_2" value="Editar"></td>
                </tr>
                <tr>
                    <td>05/05/2013</td>
                    <td>10:34:23</td>
                    <td>70.000</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                    <td><input  type="submit" class="button" id="editar_3" value="Editar"></td>
                </tr>
                <tr>
                    <td>05/05/2013</td>
                    <td>10:34:23</td>
                    <td>10.000</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                    <td><input  type="submit" class="button" id="editar_4" value="Editar"></td>
                </tr>
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