$(document).ready(function(){
  $("#AgregarSentencia").click(function() {

  //Cargar los datos del Select de Instancia 
  Orgjuris = $("#OrgJuris").val();
    $.ajax({
        url:'../vistas/categorias/selectCatInstancia.php',
        type:'POST',
        datatype: 'json',
        data:{"Orgjuris":Orgjuris}
        }).done(function(instancia){
            $('#Instancia').html(instancia)
          })
          .fail(function(){
            alert('error')
          })

  })
          
  //Cargar los datos del Select de SubInstancia
  $("#Instancia").change(function(){
    $("#Instancia option:selected").each(function() {
  Instancia = $("#Instancia").val();
  $.ajax({
      url:'../vistas/categorias/selectCatSubInstancia.php',
      type:'POST',
      datatype: 'json',
      data:{"Instancia": Instancia}
      }).done(function(Listainstancia){
          $('#SubInstancia').html(Listainstancia)
        })
        .fail(function(){
          alert('error')
        })
      })
      })     
});
  