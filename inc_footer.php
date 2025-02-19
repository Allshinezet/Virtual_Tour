</main>
  <!-- End MAIN -->

  <!-- FOOTER -->
  <footer class='bg-dark text-light text-center py-4 mt-5'>
      <div class='container'>
          <div class='row align-items-center justify-content-between'>
              <div class='col-md-6'>
                  <p class='mb-1'>&copy; 2025 RANDY - All Rights Reserved</p>
              </div>
              <div class='col-md-6'>
                  <p class='mb-1'>Made with <i class='bi bi-heart-fill text-danger'></i></p>
              </div>
          </div>
      </div>

      <!-- Back to top button -->
      <a href='#' id='back-to-top' class='btn btn-light shadow position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center' 
         style='width: 50px; height: 50px; border-radius: 50%; display: none;'>
          <i class='fa fa-arrow-up' aria-hidden='true'></i>
      </a>
  </footer>
  <!-- End FOOTER -->

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
  <script src="assets/js/main.js"></script>

  <script>
      // Back to Top Button Functionality
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('#back-to-top').fadeIn();
          } else {
              $('#back-to-top').fadeOut();
          }
      });

      $('#back-to-top').click(function () {
          $('html, body').animate({ scrollTop: 0 }, 500);
          return false;
      });
  </script>

</body>
</html>
