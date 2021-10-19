<?php
  include("head.php");
  include("menu.php");
?>

  <div class="right_col" role="main"> <!-- Inicio de contenido página -->
    <div class="x_content"><!-- Inicio cuadros de notificaciones-->
      <div class="row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i>
            </div>
            <div class="count">2</div>
            <h3>Modems</h3>
            <p>Timbradas.</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i>
            </div>
            <div class="count">10</div>
            <h3>Switch</h3>
            <p>Timbradas.</p>
          </div>
        </div>
      </div>
    </div> <!-- fin cuadros de notificaciones -->
    
    <div class="table-responsive"> <!-- Tabla Equipos informáticos-->
      <table class="table table-striped jambo_table bulk_action" id="datatable">
        <thead>
          <tr class="headings">
            <th class="column-title">No.</th>
            <th class="column-title">Nombre</th>
            <th class="column-title">Marca</th>
            <th class="column-title">Modelo</th>
            <th class="column-title">Serie</th>
            <th class="column-title">Inventario</th>
            <th class="column-title">Ubicación</th>
            <th class="column-title">Dirección IP</th>
            <th class="column-title">Dirección MAC</th>
            <th class="column-title">Estado</th>
            <th class="column-title">Observaciones</th>
          </tr>
        </thead>

        <tbody>
          <tr class="even pointer">
            <td class=" ">1</td>
            <td class=" ">Switch</td>
            <td class=" ">TpLink</td>
            <td class=" ">Rtp 501</td>
            <td class=" ">01480234</td>    
            <td class=" ">121000040</td>
            <td class=" ">Ponencia C</td>
            <td class=" ">192.168.1.30</td>
            <td class=" ">03:1D:60:12:34</td>
            <td class=" ">Activo</td>
            <td class=" ">12 de 24 puertos ocupados</td>      
        </tbody>
      </table>
    </div> <!-- Termino Tabla de nomina -->
  </div> <!-- Final de contenido página -->  
    
<?php
  include("footer.php");
?>
