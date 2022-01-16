<div class="sidebar bg-white rounded-xl" id="sidebar">
    <div class="sidebar-inner">

        <!-- Sidebar Header-->
        <div class="sidebar-header bg-gradient-success rounded-lg px-4 py-4 py-lg-5"><img class="img-fluid d-none d-lg-block" src="{{asset('img/counter-logo-white.svg')}}" alt="Ionic Counter" width="150"><img class="img-fluid d-block d-lg-none" src="{{asset('img/counter-logo-min.svg')}}" alt="Ionic Counter" width="100"></div>

        <!-- Sidebar Content-->
        <div class="sidebar-content py-4 px-lg-4">
            <!-- Sidebar List-->
            <ul class="list-unstyled mb-0">
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                <a class="sidebar-link {{ isset($dashboard) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="me-lg-2 fa-fw fas fa-cube"></i>
                        <span>{{__('Dashboard')}}</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Separator-->
            <div class="sidebar-separator my-2 my-lg-4"></div>
            <p class="text-uppercase text-xs fw-bold text-gray-500 mb-3 px-3 pt-2 pt-lg-0 px-lg-0 text-center text-lg-start">Pages</p>
            <!-- Sidebar List-->
            <ul class="list-unstyled mb-0">
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($prodPage) ? 'active' : '' }}" href="{{ route('products.index') }}">
                        <i class="me-lg-2 fa-fw fas fa-list"></i>
                        <span>{{__('Products')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($stockPage) ? 'active' : '' }}" href="{{ route('stocks.index') }}">
                        <i class="me-lg-2 fa-fw fas fa-boxes"></i>
                        <span>{{__('Stocks')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($incomePage) ? 'active' : '' }}" href="{{ route('order.incomePage') }}">
                        <i class="me-lg-2 fa-fw fas fa-boxes"></i>
                        <span>{{__('Income')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($outcomePage) ? 'active' : '' }}" href="{{ route('order.outcomePage') }}">
                        <i class="me-lg-2 fa-fw fas fa-boxes"></i>
                        <span>{{__('Outcome')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
