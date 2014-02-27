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
            
        },
        callbacks: {
            setCliente: function(data) {
                $("#nombreClienteActual").val(data.nombres);
                $("#apellidoClienteActual").val(data.apellidos);
                $("#runClienteActual").val(data.run);
                $("#correoClienteActual").val(data.correo);
                $("#calleClienteActual").val(data.calle);
                $("#poblacionClienteActual").val(data.poblacion);
                $("#numeroClienteActual").val(data.numeroDomicilio);
                $("#deptoClienteActual").val(data.depto);
                $("#celularClienteActual").val(data.telefonoCelular);
                $("#fijoClienteActual").val(data.telefonoFijo);
                //$("#nuevaRegion").val();
                //$("#nuevaComuna").val('');
            }
        }
    };
    datosPersonales.ui.init();
    window.datosPersonales = datosPersonales;
})(window);
