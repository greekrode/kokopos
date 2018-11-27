<!doctype html>
<html dir="ltr" lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('includes.header')
        @include('includes.left-sidebar')
        <div class="page-wrapper">
            @include('includes.breadcrumb')
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('includes.script')
    @stack('scripts')
</body>

</html>
