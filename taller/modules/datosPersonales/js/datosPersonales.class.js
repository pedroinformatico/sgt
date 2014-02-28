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
                    if (helper.validarCampos([
                        {id: "nombreClienteActual", type: "str", msg: "Debe ingresar un Nombre"},
                        {id: "apellidoClienteActual", type: "str", msg: "Debe ingresar un Apellido"},
                        {id: "runClienteActual", type: "str", msg: "Debe ingresar un RUN"},
                        {id: "correoClienteActual", type: "mail", msg: "Debe ingresar un Correo valido"}], "errorClienteActual")) {
                        var datos = {
                            run: $("#runClienteActual").val(),
                            nombres: $("#nombreClienteActual").val(),
                            apellidos: $("#apellidoClienteActual").val(),
                            correo: $("#correoClienteActual").val(),
                            calle: $("#calleClienteActual").val(),
                            poblacion: $("#poblacionClienteActual").val(),
                            numeroDomicilio: $("#numeroClienteActual").val(),
                            depto: $("#deptoClienteActual").val(),
                            telefonoCelular: $("#celularClienteActual").val(),
                            telefonoFijo: $("#fijoClienteActual").val(),
                            idComuna: 5
                        }
                        datosPersonales.actions.guardarModificaciones(datos);
                    }
                });
            }
        },
        actions: {
            guardarModificaciones: function(data) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_guardarModificacionCliente.php",
                    contentType: 'json',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    success: function() {
                        $('.selectDatosClientes').prop('disabled', 'disabled');
                        $(".datosClientes").attr("readonly", true);
                        $("#guardarEdicionCliente").hide();
                        $("#editarCliente").show();
                        
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
            setCliente: function(data) {
                $("#contenedorDatosCliente").hide();

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

                $("#nombreFicha").html(data.nombres + " " + data.apellidos);

                $("#contenedorDatosCliente").slideDown("fast");
            }
        }
    };
    datosPersonales.ui.init();
    window.datosPersonales = datosPersonales;
})(window);
