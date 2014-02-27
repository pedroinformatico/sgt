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
    var nuevoCliente = {
        vars: {// variables para manejar el intervalo de llamadas
            timerPatiensInWaiting: 0,
            timerPatiensForNow: 0
        },
        ui: {
            init: function() {
                nuevoCliente.ui.setEvents();
            },
            setEvents: function() {
                $("#guardarNuevoCliente").on("click", function() {
                    if (helper.validarCampos([
                        {id: "nuevoNombre", type: "str", msg: "Debe ingresar un Nombre"},
                        {id: "nuevoApellido", type: "str", msg: "Debe ingresar un Apellido"},
                        {id: "nuevoRun", type: "str", msg: "Debe ingresar un RUN"},
                        {id: "nuevoCorreo", type: "mail", msg: "Debe ingresar un Correo valido"}],"errorNuevoCliente")) {
                        var datos = {
                            run: $("#nuevoRun").val(),
                            nombres: $("#nuevoNombre").val(),
                            apellidos: $("#nuevoApellido").val(),
                            correo: $("#nuevoCorreo").val(),
                            calle: $("#nuevoCalle").val(),
                            poblacion: $("#nuevoPoblacion").val(),
                            numeroDomicilio: $("#nuevoNumero").val(),
                            depto: $("#nuevoOtro").val(),
                            telefonoCelular: $("#nuevoCelular").val(),
                            telefonoFijo: $("#nuevoTelefono").val(),
                            idComuna: 5
                        }
                        nuevoCliente.actions.guardarCliente(function() {
                            $("#nuevoRun").val('');
                            $("#nuevoNombre").val('');
                            $("#nuevoApellido").val('');
                            $("#nuevoCorreo").val('');
                            $("#nuevoCalle").val('');
                            $("#nuevoPoblacion").val('');
                            $("#nuevoNumero").val('');
                            $("#nuevoOtro").val('');
                            $("#nuevoCelular").val('');
                            $("#nuevoTelefono").val('');
                            $("#nuevaRegion").val('');
                            $("#nuevaComuna").val('');
                            $("#errorNuevoCliente").html('');
                            $("#dialogNuevoCliente").dialog("close");
                            alert("Datos guardados correctamente");
                        }, datos);
                    }
                });
            }
        },
        actions: {
            guardarCliente: function(callback, data) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_guardarCliente.php",
                    contentType: 'json',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    success: function() {
                        callback();
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
           
        }
    };
    nuevoCliente.ui.init();
    window.nuevoCliente = nuevoCliente;
})(window);
