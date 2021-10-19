<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOADING</title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<div class="principal">
		
		<form action="" id="frmSentencias">

			<label>Órgano Jurisdiccional</label><!--0-->
			<select name="OrgJuris"  id="OrgJuris" class="form-control" > <!--1-->
				<option value="1">1era. Instancia</option><!--0-->
				<option value="2">2da. Instancia</option><!--1-->
			</select>

			<label>Instancia</label><!--2-->
			<select id="Instancia" name="Instancia" class="form-control">
			</select><!--3-->
			
			<div class="form-1-2"><!--4-->
				<label for="">Archivo a subir:</label><!--0-->
				<input type="file" name="archivo" required><!--1-->
			</div>

			<div class="barra"><!--5-->
				<div class="barra_azul" id="barra_estado"><!--0-->
					<span></span><!--0-->
				</div>
			</div>

			<div class="acciones"><!--6-->
				<input type="submit" class="btn" value="Enviar"><!--0-->
				<input type="button" class="cancel" id="Cancelar" value="Cancelar"><!--1-->
			</div>

		</form>

	</div>

<script src="js/main.js"></script>
<script src="../librerias/jquery-3.3.1.min.js"></script>
<script src="../librerias/bootstrap4/popper.min.js"></script>
<script src="../librerias/bootstrap4/bootstrap.min.js"></script>
<script src="../librerias/sweetalert.min.js"></script>
<script src="../librerias/datatable/jquery.dataTables.min.js"></script>
<script src="../librerias/datatable/dataTables.bootstrap4.min.js"></script>
	</body>
</html>

