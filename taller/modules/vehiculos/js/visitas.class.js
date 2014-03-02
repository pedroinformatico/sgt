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
    var visitas = {
        ui: {
            init: function() {
                
                visitas.ui.setEvents()
            },
            setEvents: function() {
                $("#patentes").change( function(e) {
                    visitas.actions.obtenerVisitasPorAuto($("#patentes").val());
                    
                });
            }
        },
        actions: {
            obtenerPatentes: function(runCliente) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerPatentes.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {runCliente: runCliente},
                    success: function(datos) {
                        visitas.callbacks.cargarPatentes(datos);
                    },
                    error: function() {

                    }
                });
            },
            obtenerVisitasPorAuto: function(idAuto) {
                jQuery.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerVisitasPorAuto.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idAuto: idAuto},
                    success: function(datos) {
                        visitas.callbacks.cargarVisitasPorAuto(datos);
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            cargarPatentes: function(arrDatos) {
                $('#tablaHistorialAutos').dataTable().fnClearTable();
                $('#patentes option').remove();
                if (arrDatos.length > 0) {
                    for (i = 0; i < arrDatos.length; i++) {
                        $("#patentes").append('<option value=' + arrDatos[i].idAuto + '>' + arrDatos[i].patente + ' '
                                + arrDatos[i].marca + ' ' + arrDatos[i].modelo + '</option>');
                    }
                    visitas.actions.obtenerVisitasPorAuto(arrDatos[0].idAuto);
                }
            },
            cargarVisitasPorAuto: function(arrDatos) {
                $('#tablaHistorialAutos').dataTable().fnClearTable();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#tablaHistorialAutos').dataTable().fnAddData([
                        arrDatos[i].fechaIngreso + "",
                        arrDatos[i].kilometraje + "",
                        arrDatos[i].descripcion + "",
                        '<input  type="submit" class="button" onclick="vehiculos.actions.openEditNotes(\'' + arrDatos[i].idVisita + '\'); " value="Editar">'
                    ]);
                }
            }
        }
    };
    visitas.ui.init();
    window.visitas = visitas;
})(window);


