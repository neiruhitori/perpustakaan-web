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
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="">
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <label class="labels">NIS</label>
                                <input type="text" name="nis" class="form-control" placeholder="NIS"
                                    value="{{ auth()->user()->nis }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="first name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email</label>
                                <input type="text" name="email" disabled class="form-control"
                                    value="{{ auth()->user()->email }}" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Changes Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password"
                                    value="{{ auth()->user()->password }}">
                            </div>

                            <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                                    type="submit">Save Profile</button></div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    @endsection