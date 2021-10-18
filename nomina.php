
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
            <div class="count">179</div>
            <h3>Total de Nóminas</h3>
            <p>Timbradas.</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc"></i>
            </div>
            <div class="count">Empleado</div>
            <h3>RFC: VANF961224J74</h3>
            <p>Enlace: 122.</p>
          </div>
        </div>
      </div>
    </div> <!-- fin cuadros de notificaciones de nomina -->
    
    <div class="table-responsive"> <!-- Tabla de nomina -->
      <table class="table table-striped jambo_table bulk_action" id="datatable">
        <thead>
          <tr class="headings">
            <th class="column-title">Fecha de timbrado</th>
            <th class="column-title">Concepto de Nómina </th>
            <th class="column-title">Mensaje </th>
            <th class="column-title">XML</th>
            <th class="column-title">PDF </th>
          </tr>
        </thead>

        <tbody>
          <tr class="even pointer">
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
