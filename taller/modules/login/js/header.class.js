

(function(window) {
    var header = {
        ui: {
            init: function() {
                header.ui.setEvents();
            },
            setEvents: function() {
                $("#logout").on('click', function(e) {
                    header.actions.logout();
                });
            }
        },
        actions: {
            logout: function() {
                jQuery.ajax({
                    type: 'GET',
                    url: "login/_actions/logoutCallback.php",
                    contentType: 'json',
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        window.location.href = "index.php?module=login";
                    },
                    error: function(data) {
                        switch (data.status) {
                            case "error":
                                alert(data.msg);
                                break;
                            case "ok":
                                window.location.href = "index.php?module=" + data.module;
                                break;
                        }
                    }
                });
            }
        }
    };
    header.ui.init();
    window.header = header;
})(window);
