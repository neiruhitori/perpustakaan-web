<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan SMP 02 KLAKAH</title>
    <link rel="shortcut icon" href="{{ asset('AdminLTE-3.2.0/dist/img/smp2.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    @extends('layouts.app')

    @section('title', 'Home Product')

    @section('contents')


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Peminjaman Harian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                                <li class="breadcrumb-item active">Peminjaman</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger float-sm-right" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Reset
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Data Peminjaman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus semua data!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>

                                    <a href="{{ route('peminjaman.removeAll') }}" id="btn"
                                        class="btn btn-primary profile-button">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.content-header -->
                    <div class="col-md-7 mt-2 float-sm-right">
                        @if (Session::has('removeAll'))
                            <div class="btn btn-success swalDefaultSuccess" role="alert">
                                {{ Session::get('removeAll') }}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="btn btn-success swalDefaultSuccess" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>

                    <form action="/peminjaman" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" name="search" id="form1" class="form-control"
                                    placeholder="Cari Nama atau Kelas" autocomplete="off" />
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary float-sm-right">Tambah
                            Peminjaman</a>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->


            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Buku</th>
                        <th>Jumlah Buku</th>
                        <th>Kode Buku</th>
                        <th>Jam Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $p)
                            @if ($peminjaman->count() > 0)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ optional($p->siswas)->name }}</td>
                                    <td>{{ optional($p->siswas)->kelas }}</td>
                                    <td>{{ optional($p->bukusharians)->buku }}</td>
                                    <td>{{ $p->jml_buku }}</td>
                                    <td>{{ $p->kodebuku }}</td>
                                    @php
                                        $isOverdue =
                                            \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($p->jam_kembali)) &&
                                            $p->status != 0;
                                    @endphp
                                    <td class="{{ $isOverdue ? 'text-red' : '' }}">
                                        {{ $p->jam_kembali }}
                                    </td>
                                    <td>
                                        <label
                                            class="label 
                                            @if ($p->status == 0) badge bg-success 
                                            @elseif ($p->status == 1) badge bg-danger 
                                            @else badge bg-warning @endif">
                                            @if ($p->status == 0)
                                                Selesai
                                            @elseif ($p->status == 1)
                                                Sedang Meminjam
                                            @else
                                                Butuh Diproses
                                            @endif
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('peminjaman.show', $p->id) }}" type="button"
                                                class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('peminjaman.edit', $p->id) }}" type="button"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST"
                                                type="button" class="btn btn-danger p-0"
                                                onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endif
                        @empty
                            <div class="alert alert-danger">
                                Data Peminjaman Harian belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            @endsection
        </div>

</body>

</html>
