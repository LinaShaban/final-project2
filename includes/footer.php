</div>
<?php include('modals.php'); ?>
   <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
   <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
   <script src="./assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
   <script src="./assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="./assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="./assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="./assets/js/argon.js?v=1.1.0"></script>
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
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
 </body>
 </html>