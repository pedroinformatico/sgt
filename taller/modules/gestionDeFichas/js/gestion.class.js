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
    var resumen = {
        vars: { // variables para manejar el intervalo de llamadas
            timerPatiensInWaiting: 0,
            timerPatiensForNow: 0
        },
        ui: {
            init: function() {
                $('#tablePatiensInWaiting , #tablePatiensForNow').dataTable({
                    "bAutoWidth": false,
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bSort": false,
                    "oLanguage": {
                        "sUrl": "../base/lang/dt_es.txt"
                    },
                    "aoColumnDefs": [
                        {
                            "bVisible": false,
                            "aTargets": [0]
                        }
                    ]
                });
                
                resumen.ui.setEventsReservas();
                resumen.actions.getPatiensInWaiting();
                resumen.actions.getPatiensForNow();
                resumen.actions.getPatiensActual();
            },
            setEventsReservas: function() {
                $('#tablePatiensInWaiting tbody').on('click', 'td', function(e) {
                    var tempInput = $(e.currentTarget).find("input")[0];
                    if (helper.isObjectExist(tempInput)) {
                        var nTr = e.currentTarget.parentNode;
                        var aData = $('#tablePatiensInWaiting').dataTable().fnGetData(nTr);
                        resumen.callbacks.updateStateHours(aData[0]);

                    }
                });
                $("#updatetablePatiensInWaiting").on('click', function(e) {
                    resumen.actions.getPatiensInWaiting();
                });
                $("#updatetablePatiensForNow").on('click', function(e) {
                    resumen.actions.getPatiensForNow();
                });
                $("#btnAtendido").on('click', function(e) {
                    resumen.actions.UpdateStateHoursPatienActual();
                });
            }
        },
        actions: {
            getPatiensActual: function(idPatien) {
                jQuery.ajax({
                    type: 'GET',
                    url: "resumen/_actions/getPatienActual.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        resumen.callbacks.addPatien(data);
                    },
                    error: function() {

                    },
                    complete: function(data) {
                       // resumen.callbacks.addPatien(data);
                    }
                });
            },
            UpdateStateHoursPatienActual: function() {
                jQuery.ajax({
                    type: 'GET',
                    url: "resumen/_actions/updateStateHourPatienActual.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function() {

                    },
                    error: function() {

                    },
                    complete: function() {
                        resumen.actions.getPatiensInWaiting();
                        resumen.actions.getPatiensForNow();
                        helper.cleanForm(["runPatien","namePatien","lastNamePatien","hourPatien"]);
                        /*$('#runPatien').html("");
                        $('#namePatien').html("");
                        $('#lastNamePatien').html("");
                        $('#hourPatien').html("");*/
                    }
                });
            },
            updateStateHours: function(idUpdate) {
                jQuery.ajax({
                    type: 'GET',
                    url: "resumen/_actions/updateStateHours.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    data: {idHora: idUpdate,idEstado: 9},
                    success: function() {
                        
                    },
                    error: function() {

                    },
                    complete: function() {
                        resumen.actions.getPatiensInWaiting();
                        resumen.actions.getPatiensForNow();
                        resumen.actions.getPatiensActual(idUpdate);
                    }
                });
            },
            getPatiensInWaiting: function() {
                jQuery.ajax({
                    type: 'GET',
                    url: "resumen/_actions/getPatiensInWaiting.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        resumen.callbacks.addRowsPatiensInWaiting(data);
                    },
                    error: function() {

                    },
                    complete: function() {
                        if (resumen.vars.timerPatiensInWaiting) {
                            clearTimeout(resumen.vars.timerPatiensInWaiting)
                        }
                        resumen.vars.timerPatiensInWaiting = setTimeout(function() {
                            resumen.actions.getPatiensInWaiting();
                        }, 30000)
                    }
                });
            }, getPatiensForNow: function() {
                jQuery.ajax({
                    type: 'GET',
                    url: "resumen/_actions/getPatiensForNow.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        resumen.callbacks.addRowsPatiensForNow(data);
                    },
                    error: function() {

                    },
                    complete: function() {
                        if (resumen.vars.timerPatiensForNow) {
                            clearTimeout(resumen.vars.timerPatiensForNow)
                        }
                        resumen.vars.timerPatiensForNow = setTimeout(function() {
                            resumen.actions.getPatiensForNow();
                        }, 30000)
                    }
                });
            }
        },
        callbacks: {

            updateStateHours: function(id) {
                //resumen.ui.initDetalleTabla(id);
                //resumen.ui.setEventsDetalle(id);
                resumen.actions.updateStateHours(id);
            },
            addPatien: function(Object){
                $('#runPatien').html(Object.RUT);
                $('#namePatien').html(Object.NOMBRES);
                $('#lastNamePatien').html(Object.APELLIDOPAT + " " + Object.APELLIDOMAT);
                $('#hourPatien').html(Object.HORA);
            },
            addRowsPatiensInWaiting: function(arrDatos) {
                $('#tablePatiensInWaiting').dataTable().fnClearTable();
                for (var i = 0; i < arrDatos.length; i++) {
                    resumen.callbacks.addRowPatiensInWaiting(arrDatos[i]);
                }
                $('#hourUpdatetablePatiensInWaiting').html(helper.formatDateHHMMSS(new Date()));
            },
            addRowPatiensInWaiting: function(arrDatos) {
                $('#tablePatiensInWaiting').dataTable().fnAddData([
                    arrDatos.IDHORARESERVA,
                    arrDatos.RUT,
                    arrDatos.NOMBRES,
                    arrDatos.APELLIDOPAT + " " + arrDatos.APELLIDOMAT,
                    "<input type='button' class='button' value='Atender' />" //TODO: HACER EL ACTUALIZAR DATOS
                ]);
            },
            addRowsPatiensForNow: function(arrDatos) {
                $('#tablePatiensForNow').dataTable().fnClearTable();
                for (var i = 0; i < arrDatos.length; i++) {
                    resumen.callbacks.addRowPatiensForNow(arrDatos[i]);
                }
                $('#hourUpdatetablePatiensForNow').html(helper.formatDateHHMMSS(new Date()));
            },
            addRowPatiensForNow: function(arrDatos) {
                $('#tablePatiensForNow').dataTable().fnAddData([
                    arrDatos.IDHORARESERVA,
                    arrDatos.RUT,
                    arrDatos.NOMBRES,
                    arrDatos.APELLIDOPAT + " " + arrDatos.APELLIDOMAT,
                    arrDatos.HORA,
                    '<p class="estado_'+arrDatos.IDESTADO+'">'+arrDatos.ESTADO + "</p>"
                ]);
            }
        }
    };
    resumen.ui.init();
    window.resumen = resumen;
})(window);
