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
                
                gestion.actions.obtenerRegiones('nuevaRegion', 'nuevaComuna');
                gestion.actions.obtenerRegiones('regionClienteActual', 'comunaClienteActual');
                
                
                gestion.ui.setEvents();
            },
            setEvents: function() {
                
                gestion.vars.verticalTabs.onClick(function(e) {
                    $("#subModuleName").html($(this.getCurrentTab())[0].innerHTML);
                    gestion.actions.setCurTab($(this.getCurrentTab())[0].innerHTML);
                });
                
                $("#nuevoCliente").on("click", function() {    
                    helper.cleanForm(["nuevoNombre", "nuevoApellido", "nuevoRun"]);
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
            obtenerRegiones: function(idSelect, idSelectComuna) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_obtenerRegiones.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(datos) {
                        gestion.callbacks.cargarRegiones(datos, idSelect, idSelectComuna);
                    },
                    error: function() {
                        alert("error al guardar los datos");
                    },
                    complete: function(data) {
                    }
                });
            },
            obtenerComunas: function(idRegion, idSelect, comunaSeleccionada) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_obtenerComunas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idRegion: idRegion},
                    success: function(datos) {
                        gestion.callbacks.cargarComunas(datos, idSelect, comunaSeleccionada);

                    },
                    error: function() {
                        alert("error al guardar los datos");
                    },
                    complete: function(data) {
                    }
                });
            }
        },
        callbacks: {
            setTitleName: function(data) {
                //$("#pacienteActual").html(data.NOMBRES + " " + data.APELLIDOPAT);
            },
            cargarRegiones: function(arrDatos, idSelect, idSelectComuna) {
                $('#' + idSelect + ' option').remove();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#' + idSelect).append('<option value=' + arrDatos[i].idRegion + '>' + arrDatos[i].nombre + '</option>');
                }
                gestion.actions.obtenerComunas(arrDatos[0].idRegion, idSelectComuna);
            },
            cargarComunas: function(arrDatos, idSelect, comunaSeleccionada) {
                $('#' + idSelect + ' option').remove();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#' + idSelect).append('<option value="' + arrDatos[i].idComuna + '">' + arrDatos[i].nombre + '</option>');
                }
                helper.isObjectExist(comunaSeleccionada) ? $('#' + idSelect).val(comunaSeleccionada) : "";
            }
        }
    };
    gestion.ui.init();
    window.gestion = gestion;
})(window);
