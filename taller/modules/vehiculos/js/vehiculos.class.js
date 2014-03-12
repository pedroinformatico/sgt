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
            idVisitaSeleccionada:0
        },
        ui: {
            init: function() {
                vehiculos.ui.setEvents();
                $("#dialogResumenVisita").dialog({
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
                    width: 500,
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
                    helper.cleanForm(["nuevoVisitaKilometraje","nuevoVisitaFechaIngreso","nuevoVisitaDescripcion", "nuevoVisitaOT"]);
                    $("#dialogNuevaVisita").dialog("open");
                });
                $("#nuevoVehiculo").on("click", function() {
                    helper.cleanForm(["nvModelo","nvPatente","nvAnio","nvKilometraje","nvVIN"]);
                    $('#nvMarca').prop('selectedIndex',0);
                    $("#dialogNuevoVehiculo").dialog("open");
                    
                });
            }
        },
        actions: {
            openEditNotes: function(id) {
                $("#notasVehiculo").dialog("open");
                helper.cleanForm(["nuevaNota"]);
                vehiculos.vars.idVisitaSeleccionada = id;
                notas.actions.obtenerNotasPorVisita(id);
            } 
        },
        callbacks: {
        }
    };
    vehiculos.ui.init();
    window.vehiculos = vehiculos;
})(window);
