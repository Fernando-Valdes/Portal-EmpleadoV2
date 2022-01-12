<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/x-icon" href="media/TA PJECHIS.ico" />
      <title>Iniciar sesión</title>
      <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
      <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.min.css">
      <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
      <link rel="stylesheet" type="text/css" href="librerias/bootstrap-5.0.2-dist/css/bootstrap.min.css">     
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
<body>
<body>
 <header>
  <nav class="navbar sticky-top navbar-light bg-light" class="alert alert-caja-principal" role="alert">
  <div class="container-fluid">
    <a href="https://tachiapas.gob.mx/acciones-ante-el-covid-19/">MicroSitio COVID-19</a>
  </div>
</nav>
  </header>
  </div>
   <div class="container containerheight mt-2 pt-4 d-flex justify-content-center">
     <div class="card mt-5 shadow bg-white rounded">
       <div class="card-header">
                <div class="text-center social_icon">
                    <span>
                        <img src="img/logo_circular.png" width="80" height="80" >
                    </span>
                </div>
        <h3 class="fw-bold text-center">Iniciar sesión</h3>
       </div>
       <div class="card-body">
         <form method="POST" class="needs-validation frm_login" novalidate>
              <div class="input-group my-4">                
                <span class="input-group-text material-icons md-dark" id="inputGroup-sizing-default">perm_identity</span>
                
                <input type="email" class="form-control" aria-label="Sizing example input" data-toggle="tooltip" data-placement="right" title="Ingresar correo electrónico" name="email" 
                placeholder="Correo" id="email_login" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-4">                
                <span class="input-group-text material-icons md-dark span-icon" id="inputGroup-sizing-default">vpn_key</span>
                
                <input type="password" class="form-control" aria-label="Sizing example input" data-toggle="tooltip" data-placement="right" title="Ingresar Contraseña" name="contrasena" placeholder="Contraseña"
                id="password_login" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="d-grid mb-4">
                    <input type="submit" class="btn btn-primary" title="Iniciar Sesión" name="iniciar_sesion" value="Iniciar sesión">                    
              </div>
              
              <div class="d-flex justify-content-center">
					    <a title="Olvidó su contraseña" href="forgotPassword.php">¿Olvidaste tu contraseña?</a>
				      </div>
         </form>
       </div>
       <div class="card-footer">
       <div class="d-flex justify-content-center mb-2">
       ¿Aún no estás registrado?
       </div>
       <div class="d-flex justify-content-center mb-2">
       <button type="button" class="btn btn-danger" title="Registrarse" data-bs-toggle="modal" data-bs-target="#ModalNuevo" data-bs-whatever="@mdo">
        Registrarse</button>
				</div>			
       </div>
     </div>
   </div>
     <!-- Modal Nuevo-->
  <div class="modal fade" id="ModalNuevo"  role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img class="logo_registro" src="img/logo_circular.png">
          
          <h5 class="modal-title" id="staticBackdropLabel">Registrarse</h5>
          <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" title="Cerrar ventana"></button>
        </div>
      <div class="modal-body">
        <form id="frm_registro" method="POST" class="needs-validation frm_registro" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="enlace" id="enlace" placeholder="Enlace" 
                 title="Ingresar el número de Enlace" required>
                <label for="enlace">Enlace</label>
                <div class="invalid-feedback">
                  Por favor Ingrese su Enlace.
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" 
                title="Ingresar correo electrónico" required>
                <label for="correo_reg">Correo electrónico</label>
                <div class="invalid-feedback">
                   Por favor ingrese un correo electrónico.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" 
                 title="Contraseña con minimo 8 caracteres" required>
                <label for="Password">Contraseña</label>
                <div class="invalid-feedback">
                  La contraseña debe contener 8 caracteres con mayusculas, minúsculas y números.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar contraseña" title="Confirmar contraseña" required>
                <label for="confirm_password">Confirmar contraseña</label>
                <div class="invalid-feedback">
                  Por favor repita su contraseña.
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" title="Cerrar ventana">Cancelar</button>
        <button class="btn btn-primary submitBtn" id="bnRegistrate" type="submit">Registrarse</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php
require_once "layout_login/footer.php";
?>
</body>
</html>
