
$(document).ready(function(){
    $.ajax({
        url:'./vistas/categorias/GetCatOrgJuris.php',
        type:'POST',
        datatype:'json',
        data:{'peticion':'cargar_listas'}
        }).done(function(lista_org){
            $('#org_juris').html(lista_org)
          })
          .fail(function(){
            alert('Hubo un errror al cargar la lista')
          })
});