function validarPDF(){
    var archivoInput = document.getElementById('archivoSentencia');
    var archivoRuta = archivoInput.value;
    var extensionPermitida = /(.pdf)$/i;

    if(!extensionPermitida.exec(archivoRuta)){
        swal({
					type: 'error',
					title: 'ERROR...',
					text: 'Debes seleccionar únicamente archivos PDF',
					footer: 'Intenta más tarde'
				})
        archivoInput.value='';
        return false;
    }else{
    	if (archivoInput.files && archivoInput.files['0']) {

    		return true;

    		}
    	}
    }