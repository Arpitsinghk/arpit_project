<div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <script>

$('.menu-item-sample').on('click', function() {
  $(this).siblings().removeClass('active');
  $(this).addClass('active');
});

                    // password show and hide

$(document).ready(function () {
    $(".toggle-password").click(function () {
        var passwordInput = $($(this).siblings(".password-input"));
        var icon = $(this);
        if (passwordInput.attr("type") == "password") {
            passwordInput.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
})
</script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/chart/chart.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo BASE_URL ?>/assets/js/main.js"></script>
</body>

</html>