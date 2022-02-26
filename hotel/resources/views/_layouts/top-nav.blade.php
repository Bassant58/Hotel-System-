<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item pt-1">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown pt-1">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge"></span>
    </a>
  </li>
  <li class="nav-item pt-1">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li class="nav-item pt-1">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
        @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light border-0">
                    <a class="nav-link">
                        <i class="fad fa-arrow-circle-right"></i>
                        <p class="d-inline">Logout</p>
                    </a>
                </button>
            </form>
        @elseif(\Illuminate\Support\Facades\Auth::guard('manager')->check())
                <form method="POST" action="{{ route('manager.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light border-0">
                        <a class="nav-link">
                            <i class="fad fa-arrow-circle-right"></i>
                            <p class="d-inline">Logout</p>
                        </a>
                    </button>
                </form>
        @elseif(\Illuminate\Support\Facades\Auth::guard('receptionist')->check())
            <form method="POST" action="{{ route('receptionist.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light border-0">
                    <a class="nav-link">
                        <i class="fad fa-arrow-circle-right"></i>
                        <p class="d-inline">Logout</p>
                    </a>
                </button>
            </form>
        @endif

</ul>
</nav>
