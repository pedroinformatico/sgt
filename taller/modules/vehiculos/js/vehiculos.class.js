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
                $("#notasVehiculo").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 650,
                    modal: true,
                    buttons: {
                        Cancelar: function() {
                            $(this).dialog("close");
                        }
                    },
                    close: function() {

                    }
                });
                $("#dialogNuevaVisita").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 330,
                    modal: true,
                    buttons: {
                        Cancelar: function() {
                            $(this).dialog("close");
                        }
                    },
                    close: function() {

                    }
                });

                $("#dialogNuevoVehiculo").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 440,
                    modal: true,
                    buttons: {
                        Cancelar: function() {
                            $(this).dialog("close");
                        }
                    },
                    close: function() {

                    }
                });

            },
            setEvents: function() {
                $("#nuevaVisita").on("click", function() {
                    $("#dialogNuevaVisita").dialog("open");
                });
                $("#nuevoVehiculo").on("click", function() {
                    $("#dialogNuevoVehiculo").dialog("open");
                });
            }
        },
        actions: {
            openEditNotes: function(id) {
                $("#notasVehiculo").dialog("open");
            }
        },
        callbacks: {
        }
    };
    vehiculos.ui.init();
    window.vehiculos = vehiculos;
})(window);
