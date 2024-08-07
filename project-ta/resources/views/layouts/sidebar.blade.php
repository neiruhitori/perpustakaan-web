<div class="sidebar">
    <a class="user-panel mt-3 pb-3 mb-3 d-flex" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <div>
            <div class="image">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/avatar02.png') }}" alt="user-image" class="rounded-circle">

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
            <h6 class="text-overflow m-0">Selamat Datang !</h6>
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
                        Beranda
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/siswa" class="nav-link {{ Request::is('siswa') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Siswa
                    </p>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('buku') ? 'menu-open' : '' }} {{ Request::is('bukuharian') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('buku') ? 'active' : '' }} {{ Request::is('bukuharian') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Buku
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/bukuharian" class="nav-link {{ Request::is('bukuharian') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buku Harian</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/buku" class="nav-link {{ Request::is('buku') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buku Tahunan</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <div class="user-panel d-flex"></div> --}}
            <li
                class="nav-item {{ Request::is('peminjaman') ? 'menu-open' : '' }} {{ Request::is('pengembalian') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('peminjaman') ? 'active' : '' }} {{ Request::is('pengembalian') ? 'active' : '' }}">
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
            </li>
            <li
                class="nav-item {{ Request::is('peminjamantahunan') ? 'menu-open' : '' }} {{ Request::is('pengembaliantahunan') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('peminjamantahunan') ? 'active' : '' }} {{ Request::is('pengembaliantahunan') ? 'active' : '' }}">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>
                        Data Tahunan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/peminjamantahunan"
                            class="nav-link {{ Request::is('peminjamantahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Peminjaman</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/pengembaliantahunan"
                            class="nav-link {{ Request::is('pengembaliantahunan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengembalian</p>
                        </a>
                    </li>
                </ul>
            <li
                class="nav-item {{ Request::is('sedangmeminjam') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjam') ? 'menu-open' : '' }} {{ Request::is('sedangmeminjamtahunan') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjamtahunan') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link  {{ Request::is('sedangmeminjam') ? 'active' : '' }} {{ Request::is('selesaimeminjam') ? 'active' : '' }} {{ Request::is('sedangmeminjamtahunan') ? 'active' : '' }} {{ Request::is('selesaimeminjamtahunan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li
                        class="nav-item  {{ Request::is('sedangmeminjam') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjam') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-folder"></i>
                            <p>
                                Harian
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/sedangmeminjam"
                                    class="nav-link {{ Request::is('sedangmeminjam') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sedang Meminjam</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/selesaimeminjam"
                                    class="nav-link {{ Request::is('selesaimeminjam') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Selesai Meminjam</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li
                        class="nav-item {{ Request::is('sedangmeminjamtahunan') ? 'menu-open' : '' }} {{ Request::is('selesaimeminjamtahunan') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-folder"></i>
                            <p>
                                Tahunan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/sedangmeminjamtahunan"
                                    class="nav-link {{ Request::is('sedangmeminjamtahunan') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sedang Meminjam</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/selesaimeminjamtahunan"
                                    class="nav-link {{ Request::is('selesaimeminjamtahunan') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Selesai Meminjam</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('kelas/viia') ? 'menu-open' : '' }} {{ Request::is('kelas/viib') ? 'menu-open' : '' }} {{ Request::is('kelas/viic') ? 'menu-open' : '' }} {{ Request::is('kelas/viid') ? 'menu-open' : '' }} {{ Request::is('kelas/viie') ? 'menu-open' : '' }} {{ Request::is('kelas/viif') ? 'menu-open' : '' }} {{ Request::is('kelas/viig') ? 'menu-open' : '' }}
            {{ Request::is('kelas/viiia') ? 'menu-open' : '' }} {{ Request::is('kelas/viiib') ? 'menu-open' : '' }} {{ Request::is('kelas/viiic') ? 'menu-open' : '' }} {{ Request::is('kelas/viiid') ? 'menu-open' : '' }} {{ Request::is('kelas/viiie') ? 'menu-open' : '' }} {{ Request::is('kelas/viiif') ? 'menu-open' : '' }} {{ Request::is('kelas/viiig') ? 'menu-open' : '' }}
            {{ Request::is('kelas/ixa') ? 'menu-open' : '' }} {{ Request::is('kelas/ixb') ? 'menu-open' : '' }} {{ Request::is('kelas/ixc') ? 'menu-open' : '' }} {{ Request::is('kelas/ixd') ? 'menu-open' : '' }} {{ Request::is('kelas/ixe') ? 'menu-open' : '' }} {{ Request::is('kelas/ixf') ? 'menu-open' : '' }} {{ Request::is('kelas/ixg') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('kelas/viia') ? 'active' : '' }} {{ Request::is('kelas/viib') ? 'active' : '' }} {{ Request::is('kelas/viic') ? 'active' : '' }} {{ Request::is('kelas/viid') ? 'active' : '' }} {{ Request::is('kelas/viie') ? 'active' : '' }} {{ Request::is('kelas/viif') ? 'active' : '' }} {{ Request::is('kelas/viig') ? 'active' : '' }}
                {{ Request::is('kelas/viiia') ? 'active' : '' }} {{ Request::is('kelas/viiib') ? 'active' : '' }} {{ Request::is('kelas/viiic') ? 'active' : '' }} {{ Request::is('kelas/viiid') ? 'active' : '' }} {{ Request::is('kelas/viiie') ? 'active' : '' }} {{ Request::is('kelas/viiif') ? 'active' : '' }} {{ Request::is('kelas/viiig') ? 'active' : '' }}
                {{ Request::is('kelas/ixa') ? 'active' : '' }} {{ Request::is('kelas/ixb') ? 'active' : '' }} {{ Request::is('kelas/ixc') ? 'active' : '' }} {{ Request::is('kelas/ixd') ? 'active' : '' }} {{ Request::is('kelas/ixe') ? 'active' : '' }} {{ Request::is('kelas/ixf') ? 'active' : '' }} {{ Request::is('kelas/ixg') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Kelas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ Request::is('kelas/viia') ? 'menu-open' : '' }} {{ Request::is('kelas/viib') ? 'menu-open' : '' }} {{ Request::is('kelas/viic') ? 'menu-open' : '' }} {{ Request::is('kelas/viid') ? 'menu-open' : '' }} {{ Request::is('kelas/viie') ? 'menu-open' : '' }} {{ Request::is('kelas/viif') ? 'menu-open' : '' }} {{ Request::is('kelas/viig') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-folder"></i>
                            <p>
                                VII
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viia"
                                    class="nav-link  {{ Request::is('kelas/viia') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas A</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viib"
                                    class="nav-link {{ Request::is('kelas/viib') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas B</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viic"
                                    class="nav-link {{ Request::is('kelas/viic') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas C</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viid"
                                    class="nav-link {{ Request::is('kelas/viid') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas D</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viie"
                                    class="nav-link {{ Request::is('kelas/viie') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas E</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viif"
                                    class="nav-link {{ Request::is('kelas/viif') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas F</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viig"
                                    class="nav-link {{ Request::is('kelas/viig') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas G</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ Request::is('kelas/viiia') ? 'menu-open' : '' }} {{ Request::is('kelas/viiib') ? 'menu-open' : '' }} {{ Request::is('kelas/viiic') ? 'menu-open' : '' }} {{ Request::is('kelas/viiid') ? 'menu-open' : '' }} {{ Request::is('kelas/viiie') ? 'menu-open' : '' }} {{ Request::is('kelas/viiif') ? 'menu-open' : '' }} {{ Request::is('kelas/viiig') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-folder"></i>
                            <p>
                                VIII
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiia"
                                    class="nav-link {{ Request::is('kelas/viiia') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas A</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiib"
                                    class="nav-link {{ Request::is('kelas/viiib') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas B</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiic"
                                    class="nav-link {{ Request::is('kelas/viiic') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas C</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiid"
                                    class="nav-link {{ Request::is('kelas/viiid') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas D</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiie"
                                    class="nav-link {{ Request::is('kelas/viiie') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas E</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiif"
                                    class="nav-link {{ Request::is('kelas/viiif') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas F</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/viiig"
                                    class="nav-link {{ Request::is('kelas/viiig') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas G</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ Request::is('kelas/ixa') ? 'menu-open' : '' }} {{ Request::is('kelas/ixb') ? 'menu-open' : '' }} {{ Request::is('kelas/ixc') ? 'menu-open' : '' }} {{ Request::is('kelas/ixd') ? 'menu-open' : '' }} {{ Request::is('kelas/ixe') ? 'menu-open' : '' }} {{ Request::is('kelas/ixf') ? 'menu-open' : '' }} {{ Request::is('kelas/ixg') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-folder"></i>
                            <p>
                                IX
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixa"
                                    class="nav-link {{ Request::is('kelas/ixa') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas A</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixb"
                                    class="nav-link {{ Request::is('kelas/ixb') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas B</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixc"
                                    class="nav-link {{ Request::is('kelas/ixc') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas C</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixd"
                                    class="nav-link {{ Request::is('kelas/ixd') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas D</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixe"
                                    class="nav-link {{ Request::is('kelas/ixe') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas E</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixf"
                                    class="nav-link {{ Request::is('kelas/ixf') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas F</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kelas/ixg"
                                    class="nav-link {{ Request::is('kelas/ixg') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas G</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ Request::is('catatanharian') ? 'menu-open' : '' }} {{ Request::is('catatantahunan') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link  {{ Request::is('catatanharian') ? 'active' : '' }} {{ Request::is('catatantahunan') ? 'active' : '' }}">
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
                        <a href="/catatantahunan"
                            class="nav-link {{ Request::is('catatantahunan') ? 'active' : '' }}">
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
