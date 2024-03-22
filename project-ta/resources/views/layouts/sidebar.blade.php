<div class="sidebar">
    <a class="user-panel mt-3 pb-3 mb-3 d-flex" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <div>
            <div class="image">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/pp.png') }}" alt="user-image"
                    class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h6 class="text-overflow m-0">Welcome !</h6>
        </div>
        <!-- item-->
        <form id="logout-form" action="{{ url('/profile') }}" method="get">
            @csrf
            <button type="submit" class="dropdown-item notify-item">
                <i class="fe-log-out"></i> <span>Profile</span>
            </button>
        </form>
        <!-- item-->
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin Logout?')">
            @csrf
            <button type="submit" class="dropdown-item notify-item" onclick="confirmLogout()">
                <i class="fe-log-out"></i> <span>Logout</span>
            </button>
        </form>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="/dashboard" class="nav-link {{ Request::is('/')? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/peminjaman" class="nav-link {{ Request::is('peminjaman')? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Peminjaman</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/pengembalian" class="nav-link {{ Request::is('pengembalian')? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengembalian</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        Laporan Perpustakaan
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
