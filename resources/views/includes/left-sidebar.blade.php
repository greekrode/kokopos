<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::route()->getName() === 'dashboard' ? 'active' : ''}}" href="/" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'category' ? 'active' : ''}}" href="{{ route('category') }}" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Category</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'product' ? 'active' : ''}}" href="{{ route('product') }}" aria-expanded="false"><i class="mdi mdi-biohazard"></i><span class="hide-menu">Product</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'sales' ? 'active' : ''}}" href="{{ route('sales') }}" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Sales</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'stock' ? 'active' : ''}}" href="{{ route('stock') }}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Stocks</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'purchase' ? 'active' : ''}}" href="{{ route('purchase') }}" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Purchases</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'report' ? 'active' : ''}}" href="{{ route('report') }}" aria-expanded="false"><i class="mdi mdi-paperclip"></i><span class="hide-menu">Report</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">{{ __('Logout') }}</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
