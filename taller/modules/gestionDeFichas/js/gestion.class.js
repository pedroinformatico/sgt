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
    var gestion = {
        vars: {
            verticalTabs: null,
            curtab: ""
        },
        ui: {
            init: function() {
                $("#contenedorDatosCliente").hide();
                $("ul.vertical_nav").tabs("div.panes_vertical > div", {effect: 'fade'});
                gestion.vars.verticalTabs = $("ul.vertical_nav").data("tabs");
                gestion.vars.verticalTabs.onClick(function(e) {
                    $("#subModuleName").html($(this.getCurrentTab())[0].innerHTML);
                    gestion.actions.setCurTab($(this.getCurrentTab())[0].innerHTML);
                });

                $("#dialogNuevoCliente").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 570,
                    modal: true,
                    buttons: {
                        Cancelar: function() {
                            $(this).dialog("close");
                        }
                    },
                    close: function() {

                    }
                });
                gestion.ui.setEvents();
            },
            setEvents: function() {
                $("#nuevoCliente").on("click", function() {
                    $("#dialogNuevoCliente").dialog("open");
                });
            }
        },
        actions: {
            setCurTab: function(tab) {
                if (tab !== gestion.vars.curtab) {
                    gestion.vars.curtab = tab;
                    switch (gestion.vars.curtab) {
                        case "":
                        case "Datos Personales":
                            {
                                //datosPersonales.actions.getPatiensActualInSession(fichaPaciente.callbacks.setTitleName);
                                break;
                            }
                        case "Veiculos":
                            {
                                //antecedentes.actions.cargarAntecedentes();
                                break;
                            }
                        case "Historial":
                            {
                                break;
                            }
                    }
                }
            },
        },
        callbacks: {
            setTitleName: function(data) {
                //$("#pacienteActual").html(data.NOMBRES + " " + data.APELLIDOPAT);
            }
        }
    };
    gestion.ui.init();
    window.gestion = gestion;
})(window);
