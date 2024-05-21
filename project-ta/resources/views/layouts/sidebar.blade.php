<div class="sidebar">
    <a class="user-panel mt-3 pb-3 mb-3 d-flex" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <div>
            <div class="image">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/avatar02.png') }}" alt="user-image"
                    class="rounded-circle">

                {{-- @if ($profile->photoProfile != null)
                    <img src="{{ asset('/AdminLTE-3.2.0/dist/img/photoProfile/' . $profile->photoProfile) }}" alt="user-image" class="rounded-circle" style="width:40px;height:40px;border-radius:100px">
                @else
                    <img src="{{ asset('AdminLTE-3.2.0/dist/img/pp.png') }}" alt="user-image" class="rounded-circle" style="width:40px;height:40px;border-radius:100px">
                @endif --}}


                <span class="pro-user-name ml-2">
                    {{ auth()->user()->name }}
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
        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
            onsubmit="return confirm('Apakah Anda yakin ingin Logout?')">
            @csrf
            <button type="submit" class="dropdown-item notify-item" onclick="confirmLogout()">
                <span>Logout <i class="fas fa-sign-out-alt"></i> </span>
            </button>
        </form>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <div class="user-panel d-flex"></div> --}}
            <li class="nav-item  {{ Request::is('peminjaman') ? 'menu-open' : '' }} {{ Request::is('pengembalian') ? 'menu-open' : '' }} {{ Request::is('sedangmeminjam') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjam') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data Harian
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/peminjaman" class="nav-link {{ Request::is('peminjaman') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Peminjaman</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/pengembalian" class="nav-link {{ Request::is('pengembalian') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengembalian</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/sedangmeminjam" class="nav-link {{ Request::is('sedangmeminjam') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sedang Meminjam</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/selesaimeminjam" class="nav-link {{ Request::is('selesaimeminjam') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Selesai Meminjam</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('sedangmeminjam') ? 'active' : '' }} {{ Request::is('selesaimeminjam') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        Laporan Harian
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                
            </li> --}}
            {{-- <div class="user-panel mt-1 pb-1 mb-1 d-flex"></div> --}}
            <li class="nav-item  {{ Request::is('peminjamantahunan') ? 'menu-open' : '' }} {{ Request::is('pengembaliantahunan') ? 'menu-open' : '' }} {{ Request::is('sedangmeminjamtahunan') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjamtahunan') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>
                        Data Tahunan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/peminjamantahunan" class="nav-link {{ Request::is('peminjamantahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Peminjaman</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/pengembaliantahunan" class="nav-link {{ Request::is('pengembaliantahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengembalian</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/sedangmeminjamtahunan" class="nav-link {{ Request::is('sedangmeminjamtahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sedang Meminjam</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/selesaimeminjamtahunan" class="nav-link {{ Request::is('selesaimeminjamtahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Selesai Meminjam</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('sedangmeminjamtahunan') ? 'active' : '' }} {{ Request::is('selesaimeminjamtahunan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        Laporan Tahunan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

            </li> --}}
            <li class="nav-item  {{ Request::is('kelasvii') ? 'menu-open' : '' }} {{ Request::is('kelasviii') ? 'menu-open' : '' }} {{ Request::is('kelasix') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Kelas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/kelasvii" class="nav-link {{ Request::is('kelasvii') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VII</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/kelasviii" class="nav-link {{ Request::is('kelasviii') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VIII</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/kelasix" class="nav-link {{ Request::is('kelasix') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>IX</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('catatanharian') ? 'menu-open' : '' }} {{ Request::is('catatantahunan') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>
                        Catatan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/catatanharian" class="nav-link {{ Request::is('catatanharian') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Harian</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/catatantahunan" class="nav-link {{ Request::is('catatantahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tahunan</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
