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
                            <h1 class="m-0">Pengembalian</h1>
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
                    <a href="{{ route('pengembalian.pdf') }}" class="btn btn-danger mb-3 breadcrumb float-sm-right"
                        hidden>Export
                        Pengembalian</a>
                    <form action="/pengembalian" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" name="search" id="form1" class="form-control" />
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
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Buku</th>
                        <th>Jumlah Buku</th>
                        <th>Jam Pinjam</th>
                        <th>Jam Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($pengembalian->count() > 0)
                            @forelse ($pengembalian as $key => $k)
                                <tr>
                                    <td scope="row">{{ $pengembalian->firstItem() + $key }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->kelas }}</td>
                                    <td>{{ $k->buku }}</td>
                                    <td>{{ $k->jml_buku }}</td>
                                    <td>{{ $k->jam_pinjam }}</td>
                                    <td>{{ $k->jam_kembali }}</td>
                                    <td>
                                        <label
                                            class="label {{ $k->status == 1 ? 'label-danger' : 'label-success' }}">{{ $k->status == 1 ? 'Sedang Meminjam' : 'Selesai' }}</label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="close">
                                            @if ($k->status == 1)
                                            <!-- Tanpa Modal -->
                                                <a href="{{ route('pengembalian.status', $k->id) }}"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Harap periksa terlebih dahulu kelengkapan buku dan kondisi buku sebelum proses pengembalian selesai!')">Selesai</a>
                                            <!-- Tanpa Modal End -->
                                            @else
                                                {{-- <a href="" class="btn btn-sm btn-success">Meminjam</a> --}}
                                            @endif
                                        </div>
                                        {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="{{ route('pengembalian.destroy', $k->id) }}" method="POST"
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
                <div class="float-sm-left">
                    Showing
                    {{ $pengembalian->firstItem() }}
                    to
                    {{ $pengembalian->lastItem() }}
                    of
                    {{ $pengembalian->total() }}
                    entries
                </div>
                <div class="float-sm-right">
                    {{ $pengembalian->links() }}
                </div>
            @endsection
        </div>

</body>


</html>
