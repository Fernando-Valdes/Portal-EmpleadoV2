function checkPassword(valor){
  var myregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/; 
 if(myregex.test(valor)){
     return true;        
 }else{
    return false;        
}
}

$(document).on("submit", ".frm_registro", function(event){
    event.preventDefault();
    var $form = $(this);
    var espacios = false;
    var cont = 0;
    var confirm_password = { conf_password: $("#confirm_password", $form).val()};

    var data_form = {
        enlace: $("#enlace",$form).val(),
        email: $("#email",$form).val(),
        password: $("#password", $form).val(),
    }

    if(data_form.enlace.length < 1){
         Swal.fire({
            icon: 'error',
            title: 'Por ingrese su número de enlace.',
            confirmButtonText: 'De acuerdo',
            footer: '&nbsp;<b>Por ingrese su número de enlace.</b>'
          })
        return false;        
        }
        else if(data_form.email.length < 3){
         Swal.fire({
            icon: 'error',
            title: 'Por favor ingrese un correo electrónico.',
            confirmButtonText: 'De acuerdo',
            footer: '&nbsp;<b>Por favor verifique que su correo este escrito correctamente.</b>'
          })
        return false;
        }
        while (!espacios && (cont < data_form.password.length)) {
            if (data_form.password.charAt(cont) == " ")
              espacios = true;
            cont++;
          }
          if (espacios) {
            Swal.fire({
                icon: 'error',
                title: 'Error de contraseña.',
                confirmButtonText: 'De acuerdo',
                footer: '&nbsp;<b>La contraseña no puede tener espacios.</b>'
              })
            return false;
          }
        else if(data_form.password.length < 8){
         Swal.fire({
            icon: 'error',
            title: 'Error de contraseña.',
            confirmButtonText: 'De acuerdo',
            footer: '&nbsp;<center></center><b>Debe contener minimo 8 caracteres, incluyendo mayúsculas, minúsculas y números.</b></center>'
          })
        return false;
        }
        else if(!checkPassword(data_form.password)) {  
            Swal.fire({
              icon: 'error',
              title: 'Error de contraseña.',
              confirmButtonText: 'De acuerdo',
              footer: '&nbsp;<b>La contraseña debe contener mayúsculas, minúsculas y números.</b>'
            })
          return false;
        }
        else if(data_form.password != confirm_password.conf_password){
          Swal.fire({
             icon: 'error',
             title: 'Las contraseñas no coinciden.',
             confirmButtonText: 'De acuerdo'
           })
         return false;
         }
  
    var url_php = './procesos/usuario/registro/NewUser.php';

 
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
       console.log(res); 
       if(res.error !== undefined){
        const error = res.error;
        Swal.fire({
            icon: 'error',
            title: error,
            confirmButtonText: 'De acuerdo',
          })
            return false;
       }
        if(res.success){
            Swal.fire({
                icon: 'success',
                title: 'Su registro se realizo de forma exitosa',
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                footer: '<b>Redirigiendo a la página de login</b>',
                timer: 4500,

              }).then(function() {
                $("#frm_registro")[0].reset();
                window.location = res.redirect;
                });
            }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return false;
});

