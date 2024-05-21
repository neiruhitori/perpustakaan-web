@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman Tahunan Kelas VII</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Peminjaman Tahunan Kelas VII</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('a') }}">A</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('b') }}">B</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('c') }}">C</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('d') }}">D</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('e') }}">E</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('f') }}">F</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="md-3">
                        <div class="info-box mb-3">
                            <a class="info-box-icon bg-success elevation-1" href="{{ route('g') }}">G</a>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
