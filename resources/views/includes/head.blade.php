<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/images/favicon.png') }}">
<title>KKP - @yield('title')</title>
<!-- Custom CSS -->
<link href="{{ asset('libs/flot/css/float-chart.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('extra-libs/multicheck/multicheck.css') }}">
{{--<link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">--}}
<link rel="stylesheet" type="text/css" href="{{ asset('libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/quill/dist/quill.snow.css') }}">
<link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
<linK href="{{ asset('css/ajaxlivesearch.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
