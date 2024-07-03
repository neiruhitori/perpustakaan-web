<head>
    <!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!--Select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <h1 class="m-0">Create Buku</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/peminjamantahunan">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Create Buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form method="post" enctype="multipart/form-data" id="profile_setup_frm"
            action="{{ route('peminjamantahunanbuku.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Create Buku Tahunan</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">
                            {{-- <div class="col-md-6">
                                <label for="peminjamantahunan_id">Kode Pinjam</label>
                                @error('peminjamantahunan_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select class="form-control" name="peminjamantahunan_id" id="peminjamantahunan_id">
                                    <option selected disabled>Pilih Kode Pinjaman</option>
                                    @foreach ($peminjamantahunanbuku as $buku)
                                        <option scope="row" value="{{ $buku->id }}">{{ $buku->kode_pinjam }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputStatus">Buku :</label>
                                @error('buku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select id="bukucrud" name="buku" class="form-control">
                                    <option selected disabled>Pilih buku</option>
                                    @foreach ($bukucrud as $buk)
                                        <option value="{{ $buk->buku }}">{{ $buk->buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Buku :</label>
                                @error('jml_buku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="jml_buku" name="jml_buku"
                                    placeholder=" Masukkan Jumlah Buku" />
                            </div>
                            <div class="col-md-6">
                                <label>Kode Buku :</label>
                                @error('kodebuku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="kodebuku" name="kodebuku"
                                    placeholder=" Masukkan Kode Buku" />
                            </div> --}}

                            <div class="input-group mb-3" id="table">
                                <div class="col-md-6">
                                    @error('peminjamantahunan_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    @error('buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    @error('jml_buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    @error('kodebuku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Kode Pinjam</th>
                                        <th>Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Jumlah Buku</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="peminjamantahunan_id[]"
                                                id="peminjamantahunan_id">
                                                <option selected disabled>Pilih Kode Pinjaman</option>
                                                @foreach ($peminjamantahunanbuku as $buku)
                                                    <option scope="row" value="{{ $buku->id }}">
                                                        {{ $buku->kode_pinjam }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="bukucrud" name="buku[]" class="form-control">
                                                <option selected disabled>Pilih buku</option>
                                                @foreach ($bukucrud as $buk)
                                                    <option value="{{ $buk->buku }}">{{ $buk->buku }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" id="kodebuku" name="kodebuku[]"
                                                placeholder=" Masukkan Kode Buku" /></td>
                                        <td><input type="text" class="form-control" id="jml_buku" name="jml_buku[]"
                                                placeholder=" Masukkan Jumlah Buku yang di Pinjam" /></td>
                                        <td><button class="btn btn-success add_buku" type="button" name="add"
                                                id="add">Add More</button></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Buku
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Pastikan data Buku sudah benar!
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
                            <td>
                                <select class="form-control tag-select" name="peminjamantahunan_id[]" id="peminjamantahunan_id">
                                    <option selected disabled>Pilih Kode Pinjaman</option>
                                        @foreach ($peminjamantahunanbuku as $buku)
                                            <option scope="row" value="{{ $buku->id }}">{{ $buku->kode_pinjam }}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="bukucrud" name="buku[]" class="form-control tag-select">
                                    <option selected disabled>Pilih buku</option>
                                        @foreach ($bukucrud as $buk)
                                            <option value="{{ $buk->buku }}">{{ $buk->buku }}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td><input type="text" class="form-control" id="kodebuku" name="kodebuku[]" placeholder=" Masukkan Kode Buku"/></td>
                            <td><input type="text" class="form-control" id="jml_buku" name="jml_buku[]" placeholder=" Masukkan Jumlah Buku yang di Pinjam"/></td>
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
                // Dibawah ini adalah untuk fitur select2 pada saat add multiple
                $(document).ready(function() {
                    $('.tag-select').select2({
                        placeholder: 'Select tags',
                    });
                });
            }
        </script>
    @endsection
