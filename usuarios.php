<?php
  include("head.php");
  include("menu.php");
?>

  <div class="right_col" role="main"> <!-- Inicio de contenido página -->
    <div class="x_content"><!-- Inicio cuadros de notificaciones de nomina -->
      <div class="row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i>
            </div>
            <div class="count">100</div>
            <h3>Total de Usuarios</h3>
            <p>Timbradas.</p>
          </div>
        </div>
      </div>
    </div> <!-- fin cuadros de notificaciones de nomina -->
    
    <div class="table-responsive"> <!-- Tabla de nomina -->
      <table class="table table-striped jambo_table bulk_action" id="datatable">
        <thead>
          <tr class="headings">
            <th class="column-title">Descripción</th>
            <th class="column-title">Marca</th>
            <th class="column-title">Modelo</th>
            <th class="column-title">Serie</th>
            <th class="column-title">Inventario</th>
            <th class="column-title">Ubicación</th>
            <th class="column-title">F. Alta</th>
            <th class="column-title">Tipo de Resguardo</th>
            <th class="column-title">Estado</th>
            <th class="column-title">Observaciones</th>
          </tr>
        </thead>

        <tbody>
          <tr class="even pointer">
            <td class=" ">121000040</td>
            <td class=" ">May 23, 2014 11:47:56 PM </td>
            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>    
            <td class=" ">121000040</td>
            <td class=" ">May 23, 2014 11:47:56 PM </td>
            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>      
        </tbody>
      </table>
    </div> <!-- Termino Tabla de nomina -->
  </div> <!-- Final de contenido página -->  
    
<?php
  include("footer.php");
?>
