<?php 
@session_start();
require_once "../clases/SettingPDO.php";
if (isset($_SESSION['idUsuario'])) {
	include "header.php"?>
	
    <div class="card text-center">
  <div class="card-header">
    Bienvenido
  </div>
  <div class="card-body">
    <i class="fas fa-users-cog"></i>
    <h5 class="card-title">Administración de Sentencias Públicas</h5>
</div>

  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="../img/bg.mp4" type="video/mp4">
  </video>

  <!-- The header content -->
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
          <div class="card-footer text-muted">
                Tribunal Administrativo del Poder Judicial del Estado de Chiapas | Todos los Derechos Reservados | 2021 <i class="fas fa-copyright"></i>
            </div>
      </div>
    </div>
  </div>


  
    <?php
    include "footer.php";
}else{
    header("location: ../index.php");
}?>
