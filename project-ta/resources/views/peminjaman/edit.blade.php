@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/peminjaman">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form method="post" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('peminjaman.update', $peminjaman->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Peminjaman</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Buku :</label>
                                <input type="text" class="form-control" id="buku" name="buku"
                                    value="{{ $peminjaman->buku }}"/>
                            </div>
                            <div class="col-md-6">
                                <label>Nama :</label>
                                <input type="text" class="form-control" id="name" name="name"
                                value="{{ $peminjaman->name }}" />
                            </div>

                            <div class="col-md-6">
                                <label>Kelas :</label>
                                <input type="text" class="form-control" id="kelas" name="kelas"
                                value="{{ $peminjaman->kelas }}" />
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Buku :</label>
                                <input type="text" class="form-control" id="jml_buku" name="jml_buku"
                                value="{{ $peminjaman->jml_buku }}" />
                            </div>
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Jam Pinjam :</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="time" name="jam_pinjam" class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime" value="{{ $peminjaman->jam_pinjam }}"/>
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Jam Kembali :</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="time" name="jam_kembali" class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime" value="{{ $peminjaman->jam_kembali }}"/>
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <div class="col-md-6">
                                <label>Description :</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                >{{ $peminjaman->description }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-light waves-effect"
                                        id="update-modal"> <i class="fas fa-plus-circle"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    @endsection
