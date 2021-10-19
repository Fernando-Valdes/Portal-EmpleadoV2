<?php 
session_start();

if (isset($_SESSION['idUsuario'])) {
	// code...
	
	include "header.php" 
	?>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4" style="text-align: center;">Administración de las Sentencias Públicas</h1>
			<span class="btn btn-primary" data-toggle="modal" data-target="#ModalAgregarSentencias" id="AgregarSentencia">
				<span class="fas fa-plus-circle"></span> Agregar Nueva Sentencia Pública
			</span>

			<hr>
			<div id="tablaGestorArchivos"></div>
		</div>
	</div>
	<!-- Modal para Agregar Sentencias Públicas -->
	<div class="modal fade" id="ModalAgregarSentencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Sentencia Pública</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<form id="frmSentencias" enctype="multipart/form-data" method="POST">
						
								<label>Órgano Jurisdiccional</label><!--0-->
								<select name="OrgJuris" id="OrgJuris" class="form-control"></select><!--1-->
								
								<label>Instancia</label><!--2-->
								<select id="Instancia" name="Instancia" class="form-control"></select><!--3-->
								
								<label>SubInstancia</label><!--4-->
								<select id="SubInstancia" name="SubInstancia" class="form-control"><!--5-->
									<option selected disabled="disabled">Seleccionar una SubInstancia</option><!--0-->
								</select>
								
								<label>No. Expediente</label><!--6-->
								<input type="text" name="num_expediente" id="num_expediente" class="form-control" required="required"><!--7-->
								
								<label>Fecha de Publicación</label><!--8-->
								<input type="date" name="f_publicacion" id="f_publicacion" class="form-control" required="required"><!--9-->
								
								<label>Adjuntar Sentencia Pública</label><!--10-->
								<input type="file" accept="application/pdf" name="archivoSentencia" id="archivoSentencia" class="mb-4 form-control" onchange="return validarPDF()"><!--11-->

								<div id="mensaje"></div><!--12-->

								<!--BARRA LOADING-->
								<div class="barra"><!--13-->
									  <div class="barra_azul" id="barra_estado" ><!--0-->
									    	<span></span><!--0-->
									  </div>
								</div>
								
								<!--FIN DE BARRA LOADING-->

								<div class="modal-footer"><!--14-->
					<input type="submit" class="btn btn-primary" value="Enviar"><!--0-->
					<input type="button" class="btn btn-secondary" id="Cancelar" value="Cancelar"><!--1-->
				</div>
			</div>
		</div>
		</form>
		</div>
	  </div>
				

<!-- Modal Visualizar Archivos-->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualización de la Sentencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--Fin del Modal Visualizar Archivos-->

	<?php include "footer.php"?>
	
	<script src="../js/gestor.js"></script>
	<script src="../js/cargarInstancia.js"></script>
	<script src="../js/validarPDF.js"></script>
	<script src="../loading/js/main.js"></script>
	<!--Cierre por inactividad-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script src="../js/LogoutInactivity.js"></script>
	<!--Cierre por inactividad-->

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
			$('#OrgJuris').load("categorias/selectCatOrgJuris.php");

			$('#btnGuardarArchivo').click(function(){
				agregarArchivosGestor();
			});
		});

	</script>

	<?php

}else {
	header("location:../index.php");
}
?>