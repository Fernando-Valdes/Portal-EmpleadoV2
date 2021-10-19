
    
  <script src="./librerias/jquery-3.6.0.min.js"></script>
  <script src="./librerias/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
  <script src="./librerias/alertifyjs/alertify.js"></script>
  <script src="./librerias/alertifyjs/alertify.min.js"></script>
  
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
