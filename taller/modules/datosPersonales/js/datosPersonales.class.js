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
    var datosPersonales = {
        vars: {// variables para manejar el intervalo de llamadas
            timerPatiensInWaiting: 0,
            timerPatiensForNow: 0
        },
        ui: {
            init: function() {
                datosPersonales.ui.setEvents();
                datosPersonales.actions.getClientActualInSession();
                $(".datosClientes").attr("readonly", true);
                $('.selectDatosClientes').prop('disabled', 'disabled');
                $("#guardarEdicionCliente").hide();
            },
            setEvents: function() {
                $("#editarCliente").on("click", function() {
                    $(".datosClientes").attr("readonly", false);
                    $('.selectDatosClientes').prop('disabled', false);
                    $("#guardarEdicionCliente").show();
                    $("#editarCliente").hide();
                });
                $("#guardarEdicionCliente").on("click", function() {
                    $('.selectDatosClientes').prop('disabled', 'disabled');
                    $(".datosClientes").attr("readonly", true);
                    $("#guardarEdicionCliente").hide();
                    $("#editarCliente").show();
                });
            }
        },
        actions: {
            getClientActualInSession: function(callback) {
//                jQuery.ajax({
//                    type: 'GET',
//                    url: "datosPersonales/_actions/_getPatienInSession.php",
//                    contentType: 'json',
//                    dataType: 'json',
//                    cache: false,
//                    success: function(data) {
//                        datosPersonales.callbacks.addPatien(data);
//                        if (helper.isObjectExist(callback))
//                            callback(data);
//                    },
//                    error: function() {
//                    },
//                    complete: function(data) {
//                    }
//                });
            }
        },
        callbacks: {
            addPatien: function(object) {
                if (object === null)
                    return;
            }
        }
    };
    datosPersonales.ui.init();
    window.datosPersonales = datosPersonales;
})(window);
