
(function(window) {
    var visitaImprimir = {
        ui: {
            init: function() {
                $("#dialogResumenVisita").dialog({
                    autoOpen: false,
                    resizable: false,
                    width: 650,
                    modal: true,
                    buttons: {
                        Imprimir: function() {
                            $('#printeriframe').contents().find('#printcontent').html($("#contenido").html());
                            window.frames['printeriframe'].printMe();
                            $(this).dialog("close");
                        }
                    },
                    close: function() {

                    }
                });
                visitaImprimir.ui.setEvents();
            },
            setEvents: function() {
                
            }
        },
        actions: {
            abrirFichaImpresion: function(id) {
                $("#dialogResumenVisita").dialog("open");
                visitaImprimir.callbacks.limpiarFichaImpresion();
                visitaImprimir.actions.obtenerNotasPorVisita(id);
                visitaImprimir.actions.obtenerDatosVisita(id);
                //Logica para realizar las peticiones
            },
            obtenerNotasPorVisita: function(idVisita) {
                $.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_obtenerNotasPorVisitas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idVisita: idVisita},
                    success: function(datos) {
                        visitaImprimir.callbacks.agregarNotas(datos);
                    }
                });
            },
            obtenerDatosVisita: function(idVisita) {
                $.ajax({
                    type: 'GET',
                    url: "vehiculos/_actions/_imprimirVisita.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idVisita: idVisita},
                    success: function(datos) {
                        visitaImprimir.callbacks.agregarValoresImpresion(datos);
                        
                    }
                });
            }
        },
        callbacks: {
            agregarNotas: function(arrDatos) {
                for (var i = 0; i < arrDatos.length; i++) {
                    $('#imprimirNotas').append(' - ' + arrDatos[i].descripcion + ' <br/>');
                }
            },
            agregarValoresImpresion: function(arrDatos) {
                $("#imprimirNombre").html(arrDatos.nombres);
                $("#imprimirApellido").html(arrDatos.apellidos);
                $("#imprimirRUN").html(arrDatos.run);
                $("#imprimirCorreo").html(arrDatos.correo);
                $("#imprimirCalle").html(arrDatos.calle);
                $("#imprimirPoblacion").html(arrDatos.poblacion);
                $("#imprimirNumeroDomicilio").html(arrDatos.numeroDomicilio);
                $("#imprimirDptoBlock").html(arrDatos.depto);
                $("#imprimirTelefonoCelular").html(arrDatos.telefonoCelular);
                $("#imprimirTelefonoFijo").html(arrDatos.telefonoFijo);
                $("#ImprimirRegion").html(arrDatos.nombreRegion);
                $("#imprimirComuna").html(arrDatos.nombreComuna);
                $("#imprimirMarca").html(arrDatos.nombreMarca);
                $("#imprimirModelo").html(arrDatos.modelo);
                $("#imprimirPatente").html(arrDatos.patente);
                $("#imprimirAnio").html(arrDatos.anio);
                $("#imprimirKilometrajeInicio").html(arrDatos.kilometrosInicio);
                $("#imprimirVIN").html(arrDatos.vin);
                $("#imprimirKilometrajeVisita").html(arrDatos.kilometrosVisita);
                $("#imprimirFechaIngreso").html(arrDatos.fechaIngreso);
                $("#imprimirOT").val(arrDatos.ot);
                $("#imprimirDescripcion").html(arrDatos.imprimirDescripcion);
            },
            limpiarFichaImpresion: function(){
                //limpiar los datos
            }
        }
    };
    visitaImprimir.ui.init();
    window.visitaImprimir = visitaImprimir;
})(window);


