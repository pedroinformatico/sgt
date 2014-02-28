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
            },
            setEvents: function() {        
                
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
                    data: {runCliente:runCliente},
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
                    url: "vehiculos/_actions/_obtenerFichasPorAuto.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idAuto:idAuto},
                    success: function(datos) {
                        visitas.callbacks.cargarFichasPorAuto(datos);
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            cargarPatentes: function(arrDatos) {
                $('#patentes option').remove();
                for(i = 0; i<arrDatos.length; i++){  
                    $("#patentes").append('<option onclick="visitas.actions.obtenerVisitasPorAuto('+arrDatos[i].idAuto+')" value='+arrDatos[i].idAuto+'>'+arrDatos[i].patente + ' ' 
                            +arrDatos[i].marca + ' ' +arrDatos[i].modelo + '</option>');
                }
                visitas.actions.obtenerVisitasPorAuto(arrDatos[0].idAuto);
            },
            cargarFichasPorAuto: function(arrDatos) {
                $('#tablaHistorialAutos').dataTable().fnClearTable();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#tablaHistorialAutos').dataTable().fnAddData([
                        arrDatos[i].fechaIngreso + "",
                        arrDatos[i].kilometraje + "",
                        arrDatos[i].descripcion + "",  
                        '<input  type="submit" class="button" onclick="vehiculos.actions.openEditNotes(\'' + arrDatos[i].idFicha + '\'); " value="Editar">'
                    ]);
                }
            }
        }
    };
    visitas.ui.init();
    window.visitas = visitas;
})(window);


