
function agregarCatOrgJuris(){
	
	var catOrgJuris =  $('#nombreOrgJuris').val();
	var jm =  $('#jm').val();
	var puesto = $('#puesto').val();
	var siglas = $('#siglas').val();
	var fk_instancia = $('#fk_instancia').val();

	//Validaciones para evitar espacios en Blanco
	if (catOrgJuris =="") {
		swal({
						   type: 'error',
						   title: 'ERROR...',
						   text: 'No fué posible registrar!',
						   footer: 'Asegúrate de rellenar el campo &nbsp;<b>Órgano Jurisdiccional</b>'
						});
		return false;

	}else if(jm =="") {
		swal({
						   type: 'error',
						   title: 'ERROR...',
						   text: 'No fué posible registrar!',
						   footer: 'Asegúrate de rellenar el campo &nbsp;<b>Juez o Magistrada(o)</b>'
						});
		return false;

	}else if(puesto =="") {
		swal({
						   type: 'error',
						   title: 'ERROR...',
						   text: 'No fué posible registrar!',
						   footer: 'Asegúrate de rellenar el campo &nbsp;<b>puesto</b>'
						});
		return false;

	}else if(siglas =="") {
		swal({
						   type: 'error',
						   title: 'ERROR...',
						   text: 'No fué posible registrar!',
						   footer: 'Asegúrate de rellenar el campo &nbsp;<b>siglas</b>'
						});
		return false;
	
	}else{
		$.ajax({
			type: "POST",
			data:{"nombreOrgJuris":catOrgJuris,"jm":jm,"puesto":puesto,"siglas":siglas,"fk_instancia":fk_instancia},
			url:"../procesos/cat_org_juris/agregarCatOrgJuris.php",
			success: function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta==1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					$("#frmRegistroOrgJuris")[0].reset();
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

}

function eliminarCatOrgJuris(ID_ORGJURIS){
	ID_ORGJURIS=parseInt(ID_ORGJURIS);
	if (ID_ORGJURIS<1){
		swal("No tienes id de categoría");
		return false;
	}else{
		////////////////////////////////
		swal({
  title: "¿Estás seguro de eliminar esta categoría?",
  text: "Una vez eliminada, no podrá recuperarse!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
  		type:"POST",
  		data:"ID_ORGJURIS=" + ID_ORGJURIS,
  		url:"../procesos/cat_org_juris/eliminarCategoria.php",
  		success:function(respuesta){
  			respuesta=respuesta.trim();
  			if (respuesta==1) {
  				$('#tablaCategorias').load("categorias/tablaCategoria.php");
  				swal("Eliminado con Éxito", {
      			icon: "success",
    			});
  			}else{
  				swal({
						type: 'error',
						title: 'ERROR...',
						text: 'No fué posible eliminar la categoría',
						footer: 'Asegúrate de no tener sentencias públicas en esta categoría'
						});
  			}
  		}
  	});
  } 
});
		/////////////////////////////////*
	}

}


