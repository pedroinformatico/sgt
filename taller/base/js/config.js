/**
 * config 1.0
 */
(function(window) {
    var config = {
        url: 'http://chvh.janus.cl/', // Url de la aplicacion.
        //ipadMode: false,  // Descomentar en caso de no querer version para Ipad.
        ipadMode: /iPad/i.test(navigator.userAgent || navigator.vendor || window.opera), // Identifica si es un Ipad.
        debug: false, //habilita los console cuando se esta seteada como true.
        time: {
            timeOffset: 0, // Numero entero que identifica la diferencia horaria cada unidad representa 30 minutos ejemplo 2=1 hora.
            timeUrl: "http://chvh.janus.cl/tiempo.php", // Servicio que entrega la hora del servidor para calcular posible variacion en la hora.
            crossDomain: false// Booleano que identifica si el tiempo se saca de un dominio distinto al principal
        }
        
    };
    window.config = config;
})(window);