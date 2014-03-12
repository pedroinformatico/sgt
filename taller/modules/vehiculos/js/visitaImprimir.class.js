
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
                visitaImprimir.actions.obtenerNotasPorVisita(id);
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

                    },
                    error: function() {

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
        }
    };
    visitaImprimir.ui.init();
    window.visitaImprimir = visitaImprimir;
})(window);

