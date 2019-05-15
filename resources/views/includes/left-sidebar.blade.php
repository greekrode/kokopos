<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::route()->getName() === 'dashboard' ? 'active' : ''}}" href="/" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'product' ? 'active' : ''}}" href="{{ route('product') }}" aria-expanded="false"><i class="mdi mdi-biohazard"></i><span class="hide-menu">Product</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'sales' ? 'active' : ''}}" href="{{ route('sales') }}" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Sales</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'customer' ? 'active' : ''}}" href="{{ route('customer') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Customers</span></a>
                @if (Auth::user()->role === 'admin')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'category' ? 'active' : ''}}" href="{{ route('category') }}" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Category</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'stock' ? 'active' : ''}}" href="{{ route('stock') }}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Stocks</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'purchase' ? 'active' : ''}}" href="{{ route('purchase') }}" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Purchases</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'expense' ? 'active' : ''}}" href="{{ route('expense') }}" aria-expanded="false"><i class="mdi mdi-call-made"></i><span class="hide-menu">Expenses</span></a>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link {{Request::segment(1) === 'supplier' ? 'active' : ''}}" href="{{ route('supplier') }}" aria-expanded="false"><i class="mdi mdi-nature-people"></i><span class="hide-menu">Suppliers</span></a>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link has-arrow {{Request::segment(1) === 'report' ? 'active' : ''}}" href="#" aria-expanded="false"><i class="mdi mdi-paperclip"></i><span class="hide-menu">Report</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ route('report.index') }}" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Income Report </span></a></li>
                            <li class="sidebar-item"><a href="{{ route('report.index.purchase') }}" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Purchase Report </span></a></li>
                        </ul>
                    </li>
                @endif
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
