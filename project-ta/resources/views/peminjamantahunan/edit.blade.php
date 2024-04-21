<head>
    <!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Tahunan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/peminjamantahunan">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form method="post" enctype="multipart/form-data" id="profile_setup_frm"
            action="{{ route('peminjamantahunan.update', $peminjamantahunan->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Peminjaman Tahunan</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Nama :</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $peminjamantahunan->name }}" />
                            </div>

                            <div class="col-md-6">
                                <label>Kelas :</label>
                                <input type="text" class="form-control" id="kelas" name="kelas"
                                    value="{{ $peminjamantahunan->kelas }}" />
                            </div>
                            <div class="col-md-6">
                                <label>Buku :</label>
                                <input type="text" class="form-control" id="buku" name="buku"
                                    value="{{ $peminjamantahunan->buku }}" />
                            </div>
                            <div class="col-md-6">
                                <label>Kode Buku :</label>
                                <input type="text" class="form-control" id="kodebuku" name="kodebuku"
                                    value="{{ $peminjamantahunan->kodebuku }}" />
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Buku :</label>
                                <input type="text" class="form-control" id="jml_buku" name="jml_buku"
                                    value="{{ $peminjamantahunan->jml_buku }}" />
                            </div>
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Jam Pinjam :</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="date" name="jam_pinjam" class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime" value="{{ $peminjamantahunan->jam_pinjam }}" />
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
                                    <input type="date" name="jam_kembali"
                                        class="form-control datetimepicker-input" data-target="#reservationdatetime"
                                        value="{{ $peminjamantahunan->jam_kembali }}" />
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <div class="col-md-6">
                                <label>Description :</label>
                                <textarea type="text" class="form-control" id="description" name="description">{{ $peminjamantahunan->description }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fas fa-plus-circle"></i>Update
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Simpan Perubahan?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin Update?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close
                                                    </button>

                                                    <button type="submit" class="btn btn-primary waves-light waves-effect" id="update-modal">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    @endsection
