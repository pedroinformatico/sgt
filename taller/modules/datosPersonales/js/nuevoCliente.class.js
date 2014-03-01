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
                        {id: "nuevoRun", type: "rut", msg: "Debe ingresar un RUN valido"},
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
                            idComuna: $("#nuevaComuna").val()
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
            }, 
            obtenerRegiones: function(idSelect, idSelectComuna) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_obtenerRegiones.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(datos) {
                        nuevoCliente.callbacks.cargarRegiones(datos,idSelect,idSelectComuna);
                    },
                    error: function() {
                        alert("error al guardar los datos");
                    },
                    complete: function(data) {
                    }
                });  
            },
            obtenerComunas: function(idRegion, idSelect) {
                $.ajax({
                    type: 'GET',
                    url: "datosPersonales/_actions/_obtenerComunas.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idRegion: idRegion},
                    success: function(datos) {
                        nuevoCliente.callbacks.cargarComunas(datos,idSelect);
                        
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
           cargarRegiones: function(arrDatos, idSelect, idSelectComuna) {
                $('#'+idSelect+' option').remove();
                for(i = 0; i<arrDatos.length; i++){  
                    $('#'+idSelect).append('<option onclick="nuevoCliente.actions.obtenerComunas('+arrDatos[i].idRegion+',\''+idSelectComuna+'\')" value='+arrDatos[i].idRegion+'>'+arrDatos[i].nombre + '</option>');
                }
                nuevoCliente.actions.obtenerComunas(arrDatos[0].idRegion,idSelectComuna);
            },
            cargarComunas: function(arrDatos, idSelect) {
                $('#'+idSelect+' option').remove();
                for(i = 0; i<arrDatos.length; i++){  
                    $('#'+idSelect).append('<option onclick="" value="'+arrDatos[i].idComuna+'">'+arrDatos[i].nombre + '</option>');
                }
            }
        }
    };
    nuevoCliente.ui.init();
    window.nuevoCliente = nuevoCliente;
})(window);
