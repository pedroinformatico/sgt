/**
 * nuevo vehículo
 *
 * Descripcion
 * Objeto encargado de manipular el nuevo vehiculo.
 *
 * Dependencias (IMPORTANTE)
 * - jQuery 1.9.2 o superior.
 *
 */

(function(window) {
    var nuevoVehiculo = {
        ui: {
            init: function() {
                nuevoVehiculo.actions.obtenerMarcas();
                nuevoVehiculo.ui.setEvents();
            },
            setEvents: function() {        
                $("#guardarNuevoVehiculo").on('click', function(e) {
                  nuevoVehiculo.actions.agregarVehiculo($("#nvMarca").val(),
                  $("#nvModelo").val(), 
                  $("#nvPatente").val(), 
                  $("#nvAnio").val(),
                  $("#nvKilometraje").val(),
                  $("#nvVIN").val(),
                  $("#runClienteActual").val());
                });
            }
        },
        actions: {
            agregarVehiculo: function(marca,modelo,patente,anio,kilometraje,vin, runCliente) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_nuevoVehiculo.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {marca: marca,modelo: modelo,patente:patente,anio:anio,kilometraje:kilometraje,vin:vin,runCliente:runCliente},
                    success: function() {
                        alert("Se asoció el vehículo con éxito al cliente");
                        $("#dialogNuevoVehiculo").dialog("close");
                        visitas.actions.obtenerPatentes($("#runClienteActual").val());
                    },
                    error: function() {

                    }
                });
            },
            obtenerMarcas: function() {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerMarcas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {},
                    success: function(data) {
                       nuevoVehiculo.callbacks.cargarMarcas(data);
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            cargarMarcas: function(arrDatos) {
                for(i = 0; i<arrDatos.length; i++){
                    $("#nvMarca").append('<option value='+arrDatos[i].idMarca+'>'+arrDatos[i].nombre+'</option>');
                }
            }
        }
    };
    nuevoVehiculo.ui.init();
    window.nuevoVehiculo = nuevoVehiculo;
})(window);


