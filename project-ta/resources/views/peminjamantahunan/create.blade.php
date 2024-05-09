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
                        <h1 class="m-0">Create Tahunan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/peminjamantahunan">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form method="post" enctype="multipart/form-data" id="profile_setup_frm"
            action="{{ route('peminjamantahunan.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Create Peminjaman Tahunan</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Nama :</label>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder=" Masukkan Nama Siswa" />
                            </div>
                            <div class="col-md-6">
                                <label>Kelas :</label>
                                @error('kelas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="kelas" name="kelas"
                                    placeholder=" Masukkan Kelas" />
                            </div>
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Tanggal Pinjam :</label>
                                @error('jam_pinjam')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="date" name="jam_pinjam" class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime" />
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Tanggal Kembali :</label>
                                @error('jam_kembali')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="date" name="jam_kembali" class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime" />
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3"  id="table">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Jumlah Buku</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="buku[]" id="buku" class="form-control"
                                                placeholder="Masukkan Nama Buku"></td>
                                        <td><input type="text" class="form-control" id="kodebuku" name="kodebuku[]"
                                                placeholder=" Masukkan Kode Buku" /></td>
                                        <td><input type="text" class="form-control" id="jml_buku" name="jml_buku[]"
                                                placeholder=" Masukkan Jumlah Buku yang di Pinjam" /></td>
                                        <td><button class="btn btn-success add_buku" type="button" name="add"
                                                id="add">Add More</button></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.form group -->
                            <div class="col-md-6">
                                <label>Description :</label>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="Silahkan Masukkan Deskripsi Peminjaman"></textarea>
                            </div>
                            <div class="col-md-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Siswa
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Pastikan data siswa sudah benar!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close
                                                </button>

                                                <button id="btn" class="btn btn-primary profile-button"
                                                    type="submit">
                                                    Tambah
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

        </form>
        <script>
            const add = document.querySelectorAll(".input-group .add_buku")
            add.forEach(function(e) {
                e.addEventListener('click', function() {
                    let element = this.parentElement
                    // console.log(element);
                    let newElement = document.createElement('div')
                    newElement.classList.add('input-group', 'mb-3')
                    newElement.innerHTML = `
                <tr>
                    <td><input type="text" name="buku[]" id="buku" class="form-control" placeholder="Masukkan Nama Buku"></td>
                    <td><input type="text" class="form-control" id="kodebuku" name="kodebuku[]" placeholder=" Masukkan Kode Buku" /></td>
                    <td><input type="text" class="form-control" id="jml_buku" name="jml_buku[]" placeholder=" Masukkan Jumlah Buku yang di Pinjam" /></td>
                    <td><button class="btn btn-danger remove_buku" type="button" name="add" id="add">Remove</button></td>
                </tr>`
                    document.getElementById('table').appendChild(newElement)
                    callEvent()
                })
            })
            callEvent()

            function callEvent() {
                // Dibawah ini adalah untuk Hapus Input yang ditambahkan
                document.querySelector('div').querySelectorAll('.remove_buku').forEach(function(remove) {
                    remove.addEventListener('click', function(elmClick) {
                        elmClick.target.parentElement.remove()
                    })
                })
            }
        </script>
    @endsection
