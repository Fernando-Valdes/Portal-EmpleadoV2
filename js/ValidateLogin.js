function checkPassword(valor){
  var myregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/; 
 if(myregex.test(valor)){
     return true;        
 }else{
    return false;        
}}

$(document).on("submit", ".frm_login", function(event){
  event.preventDefault();
  var $form = $(this);
  var espacios = false;
  var cont = 0;
 
  var data_login = {
      email: $("#email_login",$form).val(),
      password: $("#password_login", $form).val() 
  }
  
  if(data_login.email.length < 6){
    Swal.fire({
       icon: 'error',
       title: 'Por favor ingrese un correo electrónico',
       confirmButtonText: 'De acuerdo',
       footer: '&nbsp;<b>Por favor verifique que su correo este escrito correctamente</b>'
     })
   return false;
   }
    while (!espacios && (cont < data_login.password.length)) {
          if (data_login.password.charAt(cont) == " ")
            espacios = true;
          cont++;
        }
           
        if (espacios) {
          Swal.fire({
              icon: 'error',
              title: 'La contraseña no puede tener espaciós',
              confirmButtonText: 'De acuerdo'
            })
          return false;
        }
      else if(data_login.password.length < 8){
       Swal.fire({
          icon: 'error',
          title: 'Por favor ingrése una contraseña con el formato valido',
          confirmButtonText: 'De acuerdo',
          footer: '&nbsp;<b>La contraseña esta compuesta por 8 caracteres</b>'
        })
      return false;
      }

  var url_php = './procesos/usuario/login/ProcessLogin.php';
  
  $.ajax({
      type:'POST',
      url: url_php,
      data: data_login,
      dataType: 'json',
      async: true,
  })
  .done(function ajaxDone(res){
     console.log(res); 
     if(res.error !== undefined){
      Swal.fire({
          icon: 'error',
          title: 'La información ingresada es incorrecta',
          confirmButtonText: 'De acuerdo',
          footer: '&nbsp;<b>El correo o contraseña són incorrectos</b>'
        })
          return false;
     } 
     if(res.redirect !== undefined){
      window.location = res.redirect;
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
