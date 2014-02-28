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
                    if (helper.validarCampos([{id: "nuevaNota", type: "str", msg: "Debe ingresar un la descripción de la nota"}], "errorNuevaNota")) {
                        notas.actions.insertarNota($("#nuevaNota").val(),
                                vehiculos.vars.idVisitaSeleccionada);
                        $("#errorNuevaNota").html("");
                    }
                });
            }
        },
        actions: {
            insertarNota: function(descripcion, idVisita) {

                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_agregarNota.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {descripcion: descripcion, idVisita: idVisita},
                    success: function() {
                        vehiculos.actions.openEditNotes(vehiculos.vars.idVisitaSeleccionada);
                        $("#nuevaNota").val("");
                    },
                    error: function() {

                    }
                });

            },
            obtenerNotasPorVisita: function(idVisita) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerNotasPorVisitas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idVisita: idVisita},
                    success: function(datos) {
                        notas.callbacks.cargarNotasPorVisita(datos);
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            cargarNotasPorVisita: function(arrDatos) {
                $('#tablaNotasPorVisita').dataTable().fnClearTable();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#tablaNotasPorVisita').dataTable().fnAddData([
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


