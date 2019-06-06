<footer class="footer footer-default">
    <div class="container">
      <div class="copyright float-right">
        <p>Projekt i wykonanie strony: <a href="https://aln447.github.io">Alan Krygowski</a></p>
        <p>Szablon graficzny: <a href="https://www.creative-tim.com/" target="blank">Creative Tim</a></p>
      </div>
    </div>
    <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="./assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
    <script>
      $(document).ready(function () {
        //init DateTimePickers
        materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();

        $('.search-clear').on('click', function () {
          $(this).siblings('input').val('');
        })
      });


      function scrollToDownload() {
        if ($('.section-download').length != 0) {
          $("html, body").animate({
            scrollTop: $('.section-download').offset().top
          }, 1000);
        }
      }

    </script>
  </footer>

  <!-- Classic Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body text-center">
          <h3 class="text-center title" style="margin: 0">Logowanie</h3>
          <form action="be/login_handle.php" method="POST">
            <div class="form-group">
              <label for="login">e-mail</label>
              <input type="email" name="login" id="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="passwd">hasło</label>
              <input type="password" name="passwd" id="" class="form-control" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-info">Zaloguj!</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <h4>Nie masz jeszcze konta?</h4>
          <a href="register.php" class="btn btn-block btn-primary">Zarejestruj się juz teraz!</a>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->
</body>

</html>