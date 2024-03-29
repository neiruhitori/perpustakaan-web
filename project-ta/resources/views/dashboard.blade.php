@extends('layouts.app')
  
@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')
  
@section('contents')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
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
                  <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box">
                          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
  
                          <div class="info-box-content">
                              <span class="info-box-text">Anggota</span>
                              <span class="info-box-number">{{$user}}</span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog"></i></span>
                          <div class="info-box-content">
                              <span class="info-box-text">Laporan Perpustakaan</span>
                              <span class="info-box-number">{{ $selesai }}</span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
  
                  <!-- fix for small devices only -->
                  <div class="clearfix hidden-md-up"></div>
  
                  <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-plus"></i></span>
  
                          <div class="info-box-content">
                              <span class="info-box-text">Peminjaman</span>
                              <span class="info-box-number">{{ $siswa }}</span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
  
                          <div class="info-box-content">
                              <span class="info-box-text">Pengembalian</span>
                              <span class="info-box-number">{{ $pengembalian }}</span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <img src="{{ asset('AdminLTE-3.2.0/dist/img/smp2.png') }}" width="160px" height="160px"
                      style="display: block; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: -20px;">
  
  
              </div>
              <br>
              <h2 class="text-center" style="font-family: Quicksand, sans-serif;">Perpustakaan SMPN 02 Klakah</h2>
              <p class="text-center">Alamat : Jl. Ranu No.23, Linuboyo, Klakah, Kec. Klakah, Kabupaten Lumajang, Jawa
                  Timur</p>
              <!-- /.row -->
  
  
              <!-- /.row -->
          </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
  </div>
@endsection