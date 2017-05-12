$(document).on('ready', function () {

    // Iniciar tomando la hora del cliente
    iniciarTemporizador();

    // Iniciar tomando la hora del servidor
    /*
     var dominio = 'http://localhost:8888';

     var servidor = $.get(dominio +'/hora.php', function(data){
     horaServidor = data;
     iniciarTemporizador(horaServidor);
     });
     */

});

function iniciarTemporizador(horaServidor) {

    /**
     * Fecha en la que el contador marcará cero.
     *
     * Date(año, mes, día, horas, minutos, segundos).
     *
     * año: número enero, ejemplo: 2016
     * mes: valores desde 0 (enero) a 11 (diciembre).
     * día: el día del mes.
     * horas: valores desde 0 (12 AM) a 23 (11 PM).
     * minutos: valores desde 0 a 59.
     * segundos: valores desde 0 a 59.
     *
     * Si fechaFinal es menor a fechaHoy el contador se mostrará paralizado.
     */
    /*var fechaFinal = new Date(2017, 05, 09, 23, 59, 59);

    // Usando la hora del cliente
    var fechaHoy = new Date();
*/
    // Usando la hora del servidor
    /*
     var fechaHoy = new Date(horaServidor);
     */

   /* var diferenciaMilisegundos = fechaFinal.getTime() - fechaHoy.getTime();
    var diferenciaSegundos = (diferenciaMilisegundos / 1000);
*/
    var clock = $("#mi-reloj").FlipClock({
        clockFace: 'DailyCounter',
        callbacks: {
            interval: redireccionar
        },
    });

    clock.setTime(10800);
    clock.setCountdown(true);

    /*
     * Para cuando el contador llegue a cero.
     */
    function redireccionar() {
        if (clock.getTime() <= 0) {
            window.location.replace('http://adsiar.com');
        }
    }

}