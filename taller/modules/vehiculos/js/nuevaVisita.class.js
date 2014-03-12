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
    var nuevaVisita = {
        ui: {
            init: function() {
                nuevaVisita.ui.setEvents();
                $("#nuevoVisitaFechaIngreso").datepicker();
            },
            setEvents: function() {        
                $("#guardarNuevaVisita").on('click', function(e) {    
                  nuevaVisita.actions.insertarNuevaVisita($("#runClienteActual").val(),
                  $("#nuevoVisitaKilometraje").val(), 
                  $("#nuevoVisitaFechaIngreso").val(), 
                  $("#nuevoVisitaDescripcion").val(),
                  $("#patentes").val(),
                  $("#nuevoVisitaOT").val());
                });
            }
        },
        actions: {
            insertarNuevaVisita: function(runCliente, kilometraje, fechaIngreso, descripcion, idAuto, ot) {
                $.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_guardarNuevaVisita.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {runCliente:runCliente, kilometraje:kilometraje, fechaIngreso:fechaIngreso, descripcion:descripcion, idAuto:idAuto, ot:ot},
                    success: function() {
                        $("#dialogNuevaVisita").dialog("close");
                        visitas.actions.obtenerVisitasPorAuto($("#patentes").val());
                    },
                    error: function() {

                    }
                });
            }
        },
        callbacks: {
            
        }
    };
    nuevaVisita.ui.init();
    window.nuevaVisita = nuevaVisita;
})(window);


