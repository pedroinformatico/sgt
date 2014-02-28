
helper = {
    debug: true,
    extender: function(e, m) {
        var e = e || this;
        for (var x in m) {
            if (typeof e[x] === 'object') {
                this.extender(e[x], m[x]);
            } else
                e[x] = m[x];
        }
        return e;
    },
    getIEVersion: function() {
        var rv = -1; // Return value assumes failure.
        if (navigator.appName === 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) !== null)
                rv = parseFloat(RegExp.$1);
        }
        return rv;
    },
    formatDateHHMMSS: function(date) {
        //12:12:12
        return  +this.addZero(date.getHours()) + ":" + this.addZero(date.getMinutes()) + ":" + this.addZero(date.getSeconds());
    },
    removeZero: function(string) {
        if (string.length > 1) {
            if (string.charAt(0) === "0") {
                string = string.charAt(1);
            }
        }
        return string;
    },
    addZero: function(val) {
        if (val < 10)
            return "0" + val;
        return val;
    },
    leadingZero: function(i) {
        var txt = i + '';
        if (txt.length < 2) {
            txt = '0' + txt;
        } else {
            if (txt.length === 4) {
                txt = txt.substr(2, 2);
            }
        }
        return txt;
    },
    isDefined: function(variable) {
        return (typeof(window[variable]) !== "undefined");
    },
    isObjectExist: function(variable) {
        return (typeof(variable) !== "undefined" && variable !== null);
    },
    log: function(msg) {
        if (helper.debug) {
            console.log(msg);
        }
    },
    error: function(msg) {
        if (helper.debug) {
            console.error(msg);
        }
    },
    array2json: function(arr) {
        var parts = [];
        var is_list = (Object.prototype.toString.apply(arr) === '[object Array]');
        for (var key in arr) {
            var value = arr[key];
            if (typeof value == "object") { //Custom handling for arrays
                if (is_list)
                    parts.push(array2json(value)); /* :RECURSION: */
                else
                    parts[key] = array2json(value); /* :RECURSION: */
            } else {
                var str = "";
                if (!is_list)
                    str = '"' + key + '":';
                //Custom handling for multiple data types
                if (typeof value == "number")
                    str += value; //Numbers
                else if (value === false)
                    str += 'false'; //The booleans
                else if (value === true)
                    str += 'true';
                else
                    str += '"' + value + '"'; //All other things
                // :TODO: Is there any more datatype we should be in the lookout for? (Functions?)

                parts.push(str);
            }
        }
        var json = parts.join(",");
        if (is_list)
            return '[' + json + ']'; //Return numerical JSON
        return '{' + json + '}'; //Return associative JSON
    },
    uuid: function() {
        var uuid = "", i, random;
        for (i = 0; i < 32; i++) {
            random = Math.random() * 16 | 0;
            if (i === 8 || i === 12 || i === 16 || i === 20) {
                uuid += "-"
            }
            uuid += (i === 12 ? 4 : (i === 16 ? (random & 3 | 8) : random)).toString(16);
        }
        return uuid;
    }, printMe: function(id) {
        window.frames["printeriframe"].document.getElementById("printcontent").innerHTML = document.getElementById(id).innerHTML;
        window.frames['printeriframe'].printMe();
    },
    format: function(param_valor)
    {
        var num = param_valor.replace(/\./g, "");

        if (!isNaN(num))
        {
            if (num == 0) {
                return "";
            }
            num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g, "$1.");
            num = num.split("").reverse().join("").replace(/^[\.]/, "");
        }
        else
        {
            num = param_valor.replace(/[^\d\.]*/g, "");
        }
        return "$" + num;
    },
    validateTime: function(time)
    {
        var pattern = "/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
        if (time.match(pattern))
            return true;
        return false;
    },
    verificarEntero: function(valor) {
        if (valor === null || valor.trim() === "") {
            return 0;
        } else {
            valor = parseInt(valor)
            if (isNaN(valor)) {
                return -1;
            } else {
                return valor
            }
        }
    },
    validarEntero: function(valor) {
        if (valor.trim() === "") {
            return true;
        } else {
            valor = parseInt(valor)
            if (isNaN(valor)) {
                return false
            } else {
                return true
            }
        }
    },
    validarMail: function(mail) {
        var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return re.test(mail);
    },
    validarString: function(str) {
        return str !== "";
    },
    validarRut: function(id) {
        $("#" + id).val($.Rut.formatear($("#" + id).val(),true));
        return $.Rut.validar($("#" + id).val());
    },
    validarCampos: function(data, errorID) {
        for (var i = 0; i < data.length; i++) {
            switch (data[i].type) {
                case "int":
                    if (!this.validarEntero($("#" + data[i].id).val())) {
                        $("#" + data[i].id).focus();
                        $("#" + errorID).html(data[i].msg);
                        return false;
                    }
                    break;
                case "mail":
                    if (!this.validarMail($("#" + data[i].id).val())) {
                        $("#" + data[i].id).focus();
                        $("#" + errorID).html(data[i].msg);
                        return false;
                    }
                    break;
                case "str":
                    if (!this.validarString($("#" + data[i].id).val())) {
                        $("#" + data[i].id).focus();
                        $("#" + errorID).html(data[i].msg);
                        return false;
                    }
                    break;
                case "rut":
                    if (!this.validarRut(data[i].id)) {
                        $("#" + data[i].id).focus();
                        $("#" + errorID).html(data[i].msg);
                        return false;
                    }
                    break;
            }
        }
        return true;
    },
    getIniciales: function(linea) {
        var iniciales = "";
        if (linea !== null) {
            linea += "";
            var datos = linea.split(" ");
            for (var i = 0; i < datos.length; i++) {
                iniciales += datos[i][0] + "";
            }
        }
        return iniciales;
    },
    cleanForm: function(array) {
        for (i = 0; i < array.length; i++) {
            $('#' + array[i]).html("");
        }
    }
};
