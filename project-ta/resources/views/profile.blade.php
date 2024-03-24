@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm"
            action="{{ route('profile.update') }}">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        @if (Session::has('success'))
                            <div class="btn btn-success toastrDefaultSuccess" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="row" id="res"></div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <label class="labels">NIS</label>
                                <input type="text" name="nis" disabled class="form-control" placeholder="NIS"
                                    value="{{ auth()->user()->nis }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukan Nama Baru"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ auth()->user()->email }}" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="photoProfile" class="">Tambah Foto Profile</label>
                                <div class="custom-file">
                                    <input type="file" name="photoProfile" id="photoProfile"
                                        value="{{ old('photoProfile', $profile->photoProfile) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Changes Password</label>
                                <input type="password" name="password" class="form-control"
                                    value="" placeholder="Password baru" id="MyPass">
                                <input type="checkbox" onclick="ShowHidden()">Show Password
                            </div>
                        </div>
                        <center>
                        <p>Peringatan setiap Anda mengubah <b>Nama</b>, <b>Email</b>, <b>Password</b> dan <b>Foto Profile</b>.<br>
                        Anda perlu memasukan <b>Password lama</b> atau <b>Password baru</b> anda terlebih dahulu di <b>Changes Password!</b></p>
                        </center>
                        <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                                type="submit">Save Profile</button></div>
                    </div>

                </div>
            </div>

        </form>

        <script>
            function ShowHidden() {
                var x = document.getElementById("MyPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    @endsection
