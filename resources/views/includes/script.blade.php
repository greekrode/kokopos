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
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
<!-- Charts js Files -->
<script src="{{ asset('libs/flot/excanvas.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('libs/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('js/pages/chart/chart-page-init.js') }}"></script>
<!-- Data tables -->
<script src="{{ asset('extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{ asset('extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{ asset('extra-libs/DataTables/datatables.min.js') }}"></script>
<!-- This page plugin js -->
<script src="{{ asset('libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/pages/mask/mask.init.js') }}"></script>
<script src="{{ asset('libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
<script src="{{ asset('libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
<script src="{{ asset('libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
<script src="{{ asset('libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('libs/quill/dist/quill.min.js') }}"></script>
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
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();

    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();

    /*colorpicker*/
    $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            position: $(this).attr('data-position') || 'bottom left',

            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
