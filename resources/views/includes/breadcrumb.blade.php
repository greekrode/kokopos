<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">{{ strpos(Request::route()->getName(), '.')) ? ucfirst(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), '.'))).' '. ucfirst(substr(Request::route()->getName(), strpos(Request::route()->getName(), '.')+1)) : ucfirst(Request::route()->getName() }}</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        @if(Request::segment(1) && !Request::segment(2))
                            <li class="breadcrumb-item" aria-current="page"><a class="font-bold" href="{{ Request::url()  }}">{{ ucfirst(Request::segment(1)) ?? 'Dashboard' }}</a></li>
                        @endif
                        @if(Request::segment(2))
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ Request::root().'/'.Request::segment(1) }}">{{ ucfirst(Request::segment(1)) ?? 'Dashboard' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a class="font-bold" href="{{ Request::url()  }}">{{ ucfirst(Request::segment(2)) ?? 'Dashboard' }}</a></li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
