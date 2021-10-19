<footer class="py-2 mt-5 text-center bg-dark fixed-bottom">
  <!-- Copyright -->
  <div class="container text-white">Tribunal Administrativo del Poder Judicial del Estado de Chiapas | Todos los Derechos         Reservados | Blvd. Belisario Domínguez No. 1713, Col. Xamaipak, Tuxtla Gutiérrez, Chiapas.
  <a class="text-white" href="https://www.tachiapas.gob.mx/">www.tachiapas.gob.mx</a>
  </div>
</footer> 
  <script src="./librerias/jquery-3.6.0.min.js"></script>
  <script src="./librerias/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
  <script src="./librerias/alertifyjs/alertify.js"></script>
  <script src="./librerias/alertifyjs/alertify.min.js"></script>
  <script src="./js/GetOrganojd.js"></script>
  
  <script src="./js/ValidateLogin.js"></script>
  <script src="./js/ValidateUser.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
