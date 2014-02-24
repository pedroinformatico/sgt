 /**
 * reserva
 *
 * Descripcion
 * Objeto encargado de manipular el reserva profesional.
 *
 * Dependencias (IMPORTANTE)
 * - jQuery 1.9.2 o superior.
 *
 */

        (function(window) {
            var login = {
                ui: {
                    init: function() {
                        $("#errorMsg").hide();
                        login.ui.setEvents();
                    },
                    setEvents: function() {
                        $("#pass,#user").keypress(function(e){
                            var code = (e.keyCode ? e.keyCode : e.which);
                            if (code == 13) {
                                if ($("#user").val().trim() === "") {
                                    $("#user").focus();
                                    $("#msg").html("Debe completar el campo usuario.");
                                    $("#errorMsg").show();
                                    return;
                                }
                                if ($("#pass").val().trim() === "") {
                                    $("#pass").focus();
                                    $("#msg").html("Debe completar el campo contraseña.");
                                    $("#errorMsg").show();
                                    return;
                                }
                                login.actions.logUser($("#user").val().trim(), $("#pass").val().trim());
                            }
                        });

                        $("#login").on('click', function(e) {
                            if ($("#user").val().trim() === "") {
                                $("#user").focus();
                                $("#msg").html("Debe completar el campo usuario.");
                                $("#errorMsg").show();
                                return;
                            }

                            if ($("#pass").val().trim() === "") {
                                $("#pass").focus();
                                $("#msg").html("Debe completar el campo contraseña.");
                                $("#errorMsg").show();
                                return;
                            }

                            login.actions.logUser($("#user").val().trim(), $("#pass").val().trim());
                        });
                    }
                },
                actions: {
                    logUser: function(user, pass) {
                        jQuery.ajax({
                            type: 'GET',
                            url: "login/_actions/loginCallback.php",
                            contentType: 'json',
                            dataType: 'json',
                            cache: false,
                            data: {user: user, pass: pass},
                            success: function(data) {
                                switch (data.status) {
                                    case "error":
                                        $("#msg").html(data.msg);
                                        $("#errorMsg").show();
                                        break;
                                    case "ok":
                                        window.location.href = "index.php?module=" + data.module;
                                        break;
                                }
                            },
                            error: function() {

                            }
                        });
                    }
                }
            };
            login.ui.init();
            window.login = login;
        })(window);
