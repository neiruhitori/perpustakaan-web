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
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    @extends('layouts.app')

    @section('title', 'Home Product')

    @section('contents')


        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <div class="container-fluid">
                <div class="card-header">
                    <!-- /.content-header -->
                    <h1 class="mb-0">List Peminjaman</h1>
                    @if (Session::has('success'))
                        <div class="btn btn-success swalDefaultSuccess" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary breadcrumb float-sm-right">Add
                        Peminjaman</a>
                </div>

            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
            <hr />

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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($peminjaman->count() > 0)
                            @forelse ($peminjaman as $key => $p)
                                <tr>
                                    <td scope="row">{{ $peminjaman->firstItem() + $key }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->kelas }}</td>
                                    <td>{{ $p->buku }}</td>
                                    <td>{{ $p->jml_buku }}</td>
                                    <td>{{ $p->jam_pinjam }}</td>
                                    <td>{{ $p->jam_kembali }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('peminjaman.show', $p->id) }}" type="button"
                                                class="btn btn-secondary"><i class="fas fa-clone"></i></a>
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
                    {{ $peminjaman->firstItem() }}
                    to
                    {{ $peminjaman->lastItem() }}
                    of
                    {{ $peminjaman->total() }}
                    entries
                </div>
                <div class="float-sm-right">
                    {{ $peminjaman->links() }}
                </div>
            @endsection
        </div>

</body>

</html>
