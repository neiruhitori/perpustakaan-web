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
                            <h1 class="m-0">Pengembalian Tahunan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Pengembalian</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    @if (Session::has('success'))
                        <div class="btn btn-success swalDefaultSuccess" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <a href="{{ route('pengembaliantahunan.pdf') }}" class="btn btn-danger mb-3 breadcrumb float-sm-right"
                        hidden>Export
                        Pengembalian</a>
                    <form action="/pengembaliantahunan" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" name="search" id="form1" class="form-control" placeholder="Cari Nama atau Kelas"/>
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjam</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Buku</th>
                        <th>Jumlah Buku</th>
                        <th>Kode Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($pengembaliantahunan->count() > 0)
                            @forelse ($pengembaliantahunan as $k)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $k->kode_pinjam }}</td>
                                    <td>{{ optional($k->siswas)->name }}</td>
                                    <td>{{ optional($k->siswas)->kelas }}</td>
                                    <td>
                                        @foreach ($k->bukus()->get() as $b)
                                        
                                            <ul type=disc>
                                                <li>{{ $b->buku }}</li>
                                            </ul>
                                        
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($k->bukus()->get() as $c)
                                        
                                            <ul type=circle>
                                                <li>{{ $c->jml_buku }}</li>
                                            </ul>
                                        
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($k->bukus()->get() as $d)
                                        
                                            <ul type=circle>
                                                <li>{{ $d->kodebuku }}</li>
                                            </ul>
                                        
                                        @endforeach
                                    </td>
                                    {{-- Dibawah Ini adalah Logika untuk membuat text pada jam_kembali berwarna merah jika melebihi batas tanggal --}}
                                    @php
                                        $isOverdue = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($k->jam_kembali)) && $k->status != 0;
                                    @endphp
                                    <td class="{{ $isOverdue ? 'text-red' : '' }}">
                                        {{ $k->jam_kembali }}
                                    </td>
                                    {{-- =========================================================================================================== --}}
                                    <td>
                                        <label
                                            class="label {{ $k->status == 1 ? 'badge bg-danger' : 'badge bg-success' }}">{{ $k->status == 1 ? 'Sedang Meminjam' : 'Selesai' }}</label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="close">
                                            @if ($k->status == 1)
                                            <!-- Tanpa Modal -->
                                                <a href="{{ route('pengembaliantahunan.status', $k->id) }}"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Harap periksa terlebih dahulu kelengkapan buku dan kondisi buku sebelum proses pengembalian selesai!')">Selesai</a>
                                            <!-- Tanpa Modal End -->
                                            @else
                                                {{-- <a href="" class="btn btn-sm btn-success">Meminjam</a> --}}
                                            @endif
                                        </div>
                                        {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="{{ route('pengembaliantahunan.destroy', $k->id) }}" method="POST"
                                                type="button" class="btn btn-danger p-0"
                                                onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div> --}}
                                    </td>
                                </tr>

                            @empty
                                <div class="alert alert-danger">
                                    Data Kategori Repositori belum Tersedia.
                                </div>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            @endsection
        </div>

</body>


</html>
