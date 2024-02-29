<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan SMP 02 KLAKAH</title>

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
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('AdminLTE-3.2.0/dist/img/smp2.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('komponen-admin.navbar-master')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/smp2.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
            </a>

            <!-- Sidebar -->
            @include('komponen-admin.sidebar-master')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Peminjaman</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Data Peminjaman</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Peminjaman Buku</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                <form action="{{ url('updatepeminjaman/'.$editpeminjaman->id) }}" id="form-store" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <label>Buku :</label>
                                            <select class="form-control" id="buku_id" name="buku_id">
                                                
                                                <option>{{ $editpeminjaman->buku_id }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nama :</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder=" Masukkan Nama Siswa"
                                                value="{{ $editpeminjaman->name }}" />
                                        </div>

                                        <div class="col-md-6">
                                            <label>Kelas :</label>
                                            <input type="text" class="form-control" id="kelas" name="kelas"
                                                placeholder=" Masukkan Kelas" value="{{ $editpeminjaman->kelas }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jumlah Buku :</label>
                                            <input type="text" class="form-control" id="jml_buku" name="jml_buku"
                                                placeholder=" Masukkan Jumlah Buku yang di Pinjam"
                                                value="{{ $editpeminjaman->jml_buku }}" />
                                        </div>
                                        <!-- Date and time -->
                                        <div class="form-group">
                                            <label>Tanggal Pinjam :</label>
                                            <div class="input-group date" id="reservationdatetime"
                                                data-target-input="nearest">
                                                <input type="date" name="tgl_pinjam"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime"
                                                    value="{{ $editpeminjaman->tgl_pinjam }}" />
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Date and time -->
                                        <div class="form-group">
                                            <label>Tanggal Kembali :</label>
                                            <div class="input-group date" id="reservationdatetime"
                                                data-target-input="nearest">
                                                <input type="date" name="tgl_kembali"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime"
                                                    value="{{ $editpeminjaman->tgl_kembali }}" />
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form group -->

                                    </div>
                                    <div class="form-group mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-light waves-effect"
                                                id="update-modal"> <i class="fas fa-plus-circle"></i>
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </table>
                        </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('komponen-admin.footer-master')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    @include('data-master.js-dmaster')
</body>

</html>
