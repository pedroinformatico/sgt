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
    var notas = {
        ui: {
            init: function() {
                notas.ui.setEvents();
            },
            setEvents: function() {        
                $("#agregarNuevaNota").on('click', function(e) {    
                  notas.actions.insertarNota($("#nuevaNota").val(),
                  vehiculos.vars.idFichaSeleccionada);
                });
            }
        },
        actions: {
            insertarNota: function(descripcion, idFicha) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_agregarNota.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: { descripcion:descripcion, idFicha:idFicha},
                    success: function() {
                        alert("Se agregó una nueva nota a la visita");
                        vehiculos.actions.openEditNotes(vehiculos.vars.idFichaSeleccionada);
                        $("#nuevaNota").val("");
                    },
                    error: function() {

                    }
                });
            },
            obtenerNotasPorFicha: function(idFicha) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerNotasPorVisitas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idFicha:idFicha},
                    success: function(datos) {
                        notas.callbacks.cargarNotasPorFicha(datos);
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            cargarNotasPorFicha: function(arrDatos) {
                $('#tablaNotasPorFicha').dataTable().fnClearTable();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#tablaNotasPorFicha').dataTable().fnAddData([
                        arrDatos[i].fechaRegistro + "",
                        arrDatos[i].descripcion + ""
                    ]);
                }
            }
        }
    };
    notas.ui.init();
    window.notas = notas;
})(window);


