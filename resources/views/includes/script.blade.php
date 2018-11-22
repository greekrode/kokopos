<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- ============================================================== -->
<script src="{{ asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="{{ asset('libs/flot/excanvas.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('js/pages/chart/chart-page-init.js') }}"></script>
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
</script>
