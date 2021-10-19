	document.addEventListener("DOMContentLoaded",()=>{
		let form=document.getElementById('frmSentencias');

		form.addEventListener("submit",function(event){
			event.preventDefault();
			subir_archivos(this);
		});
	});

//FUNCIÓN QUE HABILITA EL LOADING...

function subir_archivos(form){
	let barra_estado=form.children[13].children[0],
	span=barra_estado.children[0],
	boton_cancelar=form.children[14].children[1];

	barra_estado.classList.remove('barra_verde','barra_roja');

	//petición AJAx

	let peticion=new XMLHttpRequest();
	var respuesta;
	//Progreso

	peticion.upload.addEventListener("progress",(event)=>{
		let porcentaje=Math.round((event.loaded / event.total) * 100);


		barra_estado.style.width=porcentaje+"%";
		span.innerHTML=porcentaje+"%";


		if (porcentaje===100) {
			respuesta=1;
			$('#tablaGestorArchivos').load("../vistas/gestor/tablaGestor.php");
		}else{
			respuesta=0;
		}

	});

	
	//enviar datos

	peticion.open("POST","../procesos/gestor/guardarArchivos.php");
	peticion.send(new FormData(form));


		if (respuesta=1) {
		$("#frmSentencias")[0].reset();
	
	}else{
		swal("=(","Falló al Agregar","Error");
	}
	


		//finalizado

	peticion.addEventListener("load",()=>{
		barra_estado.classList.add('barra_verde');
		span.innerHTML="Proceso Completado";
	});


	//cancelar

	boton_cancelar.addEventListener("click",()=>{
		peticion.abort();
		barra_estado.classList.remove('barra_verde');
		barra_estado.classList.add('barra_roja');
		span.innerHTML="Proceso Cancelado";
	});
}