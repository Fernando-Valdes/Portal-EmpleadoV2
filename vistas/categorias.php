<?php 
session_start();

if (isset($_SESSION['idUsuario'])) {
	// code...
	
	include "header.php" 
	?>
 	<div class="jumbotron jumbotron-fluid">
 		<div class="container">
 			<h2 class="display-4" style="text-align: center;">Órgano Jurisdiccional al que Pertenece:</h2>
 		<!--	<div class="row">
 				<div class="col-sm-4">
 					<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaOrgJuris">
 						<span class="fas fa-plus-circle"></span> Agregar Nuevo Órgano Jurisdiccional
 					</span>
 				</div>
 			</div>-->
 			<hr>
 			<div class="row">
 				<div class="col-sm-12">
 					<div id="tablaCategorias"></div>
 				</div>
 			</div>
 		</div>
 	</div>


 	<!-- Modal -->
 	<div class="modal fade" id="modalAgregaOrgJuris" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Órgano Jurisdiccional</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<form id="frmRegistroOrgJuris">
 						<label>Órgano Jurisdiccional</label>
 						<input type="text" name="nombreOrgJuris" id="nombreOrgJuris" class="form-control">
 						<label for="" id="lbnombreOrgJuris"></label>
 						<label>Juez o Magistrada(o)</label>
 						<input type="text" name="jm" id="jm" class="form-control">
 						<label>Siglas</label>	
 						<input type="text" name="siglas" id="siglas" class="form-control">
             <label>Instancia</label>
            <select type="text" name="fk_instancia" id="fk_instancia" class="form-control"> 
              <option value="1">PRIMERA INSTANCIA</option>
              <option value="2">SEGUNDA INSTANCIA</option>
          </select>
 					</form>
 				</div>
 				<div id="respuesta"></div>
 				<div class="modal-footer">
 					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
 					<button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!--Fin del Modal-->

 <?php
 include "footer.php";

 ?>
   <!--Dependencia de categorías, todas la funciones js de categorías-->
   <script src="../librerias/sweetalert2.all.min.js"></script>
 	<script src="../js/categoria.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function(){
 			$('#tablaCategorias').load("categorias/tablaCategoria.php");

 			$('#btnGuardarCambios').click(function(){
 				agregarCatOrgJuris();
 			});
 		});
 	</script>



 <?php

 }else{
 	header("location: ../index.php");
 }

 ?>

