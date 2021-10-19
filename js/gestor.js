function agregarArchivosGestor(){
	

	var	catOrgJuris =  $('#categoriasArchivos').val();
	var	catInstancia =  $('#cargarCategoriaInstancia').val();
	var	catSubInstancia = $('#cargarCategoriaSubInstancia').val();
	var	numExpediente= $('#num_expediente').val();
	var	fecha_publicacion= $('#f_publicacion').val();
	var CargarArchivo = $('#archivoSentencia').val();


	var	formData=new FormData(document.getElementById('frmSentencias'));

	$.ajax({
		type:"POST",
		datatype: "html",
		data: formData,
		url:"../procesos/gestor/guardarArchivos.php",
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			respuesta = respuesta.trim();
			if (respuesta===1){	
				$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				$("#frmSentencias")[0].reset();
				swal({
					type: 'success',
					title: 'Enhorabuena...',
					text: 'El registro se realizó correctamente!'
				});
				
			}else{
				swal({
					type: 'error',
					title: 'ERROR...',
					text: 'No fué posible registrar!',
					footer: 'Intenta más tarde'
				})
			}
		}
	});
}

function eliminarArchivo(idExpediente) {
	swal({
		title: "¿Estás seguro de eliminar este archivo?",
		text: "Una vez eliminado, no podrá recuperarse.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"ID_EXPEDIENTE="+idExpediente,
				url:"../procesos/gestor/eliminarArchivo.php",
				success: function(respuesta){
					respuesta=respuesta.trim();
					if (respuesta=1) {
						$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
						swal("¡Eliminado con Éxito!", {
							icon: "success",
						});
					}else{
						swal("Hubo un Error al Eliminar.", {
							icon: "error",
						});
					}
				}
			});
		}
	});
}

function obtenerExpedienteporId(idExpediente){
	$.ajax({
		type:"POST",
		data:"ID_EXPEDIENTE="+idExpediente,
		url:"../procesos/gestor/obtenerNuevoArchivo.php",
		success:function(respuesta){
			$('#archivoObtenido').html(respuesta);
		}
	});
}
