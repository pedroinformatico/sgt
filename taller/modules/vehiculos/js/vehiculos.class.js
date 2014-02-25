/**
 * resumen
 *
 * Descripcion
 * Objeto encargado de manipular el resumen profesional.
 *
 * Dependencias (IMPORTANTE)
 * - jQuery 1.9.2 o superior.
 */

(function(window) {
    var vehiculos = {
        vars: {
        },
        ui: {
            init: function() {
                vehiculos.ui.setEvents();
                $("#notasVehiculo").hide();
            },
            setEvents: function() {
                $("#volverLista").on("click", function() {
                    $("#notasVehiculo").hide();
                    $("#listaVehiculos").show();
                });
                
                $(".verDetalleVehiculo").on("click", function() {
                    $("#notasVehiculo").show();
                    $("#listaVehiculos").hide();
                });
            }
        },
        actions: {
            
        },
        callbacks: {
            
        }
    };
    vehiculos.ui.init();
    window.vehiculos = vehiculos;
})(window);
