<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-decoration-none">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                @if(\Illuminate\Support\Facades\Auth::guard('manager')->check())
                     <a href="#" class="d-block h2 text-decoration-none">{{\Illuminate\Support\Facades\Auth::guard('manager')->user()->name}}</a>
                @elseif(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                     <a href="#" class="d-block h2 text-decoration-none">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
                @elseif(\Illuminate\Support\Facades\Auth::guard('receptionist')->check())
                     <a href="#" class="d-block h2 text-decoration-none">{{\Illuminate\Support\Facades\Auth::guard('receptionist')->user()->name}}</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @role('admin','admin')
                <li class="nav-item">
                    <a href="{{route('manage.manager')}} " class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage Mangers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-receptionest" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage receptionest
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-user" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                             Manage Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-floor" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage Floors

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-room" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage rooms
                        </p>
                    </a>
                </li>
                @endrole
                @role('manager','manager')
                <li class="nav-item">
                    <a href="/mang-receptionest" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage receptionest
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-floor" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage Floors

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-room" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            Manage rooms
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mang-user" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                             Manage Users
                        </p>
                    </a>
                </li>
                @endrole
                @role('receptionist','receptionist') 
                <li class="nav-item">
                    <a href="/mang-user" class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                             Manage Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=" {{route('client.data')}} " class="nav-link">
                        <i class="nav-icon fad fa-arrow-circle-right"></i>
                        <p>
                            My Approved Clients
                        </p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
