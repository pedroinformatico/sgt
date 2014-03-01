/**
 * Datos Personales
 *
 * Descripcion
 * Objeto encargado de manipular el Datos Pprsonales.
 *
 * Dependencias (IMPORTANTE)
 * - jQuery 1.9.2 o superior.
 */

(function(window) {
    var resultadoBusqueda = {
        vars: {// variables para manejar el intervalo de llamadas
            timerPatiensInWaiting: 0,
            timerPatiensForNow: 0
        },
        ui: {
            init: function() {
                resultadoBusqueda.ui.setEvents();
                $("#tablaResultadoBusqueda").dataTable({
                    "bAutoWidth": false,
                    "oLanguage": {
                        "sUrl": "../base/lang/dt_es.txt"
                    }
                });

                $("#dialogResultadoBusqueda").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 450,
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
                $("#buscar").on("click", function() {
                    var data = {
                        nombre: $("#nombreBusqueda").val(),
                        apellido: $("#apellidoBusqueda").val(),
                        run: $("#runBusqueda").val(),
                        patente: $("#patenteBusqueda").val()
                    }
                    resultadoBusqueda.actions.buscar(data);
                });
            }
        },
        actions: {
            buscar: function(dataBusqueda) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_buscarCliente.php",
                    contentType: 'json',
                    dataType: 'json',
                    data: dataBusqueda,
                    cache: false,
                    success: function(data) {
                        if (data !== null) {
                            if (data.length > 1) {
                                resultadoBusqueda.callbacks.addRowsResultados(data);
                            } else {
                                resultadoBusqueda.actions.verDetalleCliente(data[0].run);
                            }
                        }
                    },
                    error: function() {
                        alert("error al guardar los datos");
                    },
                    complete: function() {
                    }
                });
            },
            verDetalleCliente: function(run) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_obtenerClientePorRun.php",
                    contentType: 'json',
                    dataType: 'json',
                    data: {run: run},
                    cache: false,
                    success: function(data) {
                        if(data!==null){
                            nuevoCliente.actions.obtenerRegiones('regionClienteActual','comunaClienteActual');
                            datosPersonales.callbacks.setCliente(data);
                            
                            visitas.actions.obtenerPatentes(run);
                        }
                    },
                    error: function() {
                        alert("error al guardar los datos");
                    },
                    complete: function(data) {
                    }
                });
                $("#dialogResultadoBusqueda").dialog("close");
            }
        },
        callbacks: {
            addRowsResultados: function(arrDatos) {
                $('#tablaResultadoBusqueda').dataTable().fnClearTable();
                for (i = 0; i < arrDatos.length; i++) {
                    $('#tablaResultadoBusqueda').dataTable().fnAddData([
                        arrDatos[i].run + "",
                        arrDatos[i].nombre + "",
                        arrDatos[i].apellido + "",
                        '<input  type="submit" class="button" onclick="resultadoBusqueda.actions.verDetalleCliente(\'' + arrDatos[i].run + '\'); " value="Seleccionar">'
                    ]);
                }
                $("#dialogResultadoBusqueda").dialog("open");
            }
        }
    };
    resultadoBusqueda.ui.init();
    window.resultadoBusqueda = resultadoBusqueda;
})(window);
