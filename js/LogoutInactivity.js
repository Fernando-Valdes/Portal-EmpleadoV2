var base_url = 'inicio.php';
var timeout;


document.onmousemove = function(){ 
    window.clearTimeout(timeout);
    contadorSesion(); //aqui cargamos la funcion de inactividad
} 
document.onkeypress = function(){ 
    window.clearTimeout(timeout);
    contadorSesion(); //aqui cargamos la funcion de inactividad
}  

function contadorSesion() {
   timeout = window.setTimeout(function () {
        $.confirm({
            title: 'Alerta de Inactividad!',
            content: 'Por seguridad la sesión esta a punto de expirar.',
            autoClose: 'expirar|10000',//cuanto tiempo necesitamos para cerrar la sess automaticamente
            type: 'red',
            icon: 'fa fa-spinner fa-spin',
            buttons: {
                expirar: {
                    text: 'Cerrar Sesión',
                    btnClass: 'btn-red',
                    action: function () {
                        salir();
                    }
                },
                permanecer: function () {
                    window.clearTimeout(timeout); //reinicia el conteo
                    $.alert('La sesión ha sido reiniciada!'); //mensaje
                    //window.location.href = base_url + "dashboard";
                }
            }
        });
    }, 1000*60*15);//3 segundos para no demorar tanto 
}

function salir() {
    $.ajax({
        type: "POST",
        url: '../procesos/usuario/Logout.php',
        data: {functionName: 'delete_session'},
        dataType: 'json',
        success: function (response) {
            console.log(response.msg); //coloco una notificacion para observar el momento en el q se ejecuta
            window.location = "../index.php";
        }
 });
}