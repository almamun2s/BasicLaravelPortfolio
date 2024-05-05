@extends('admin.admin_master')
@section('title', 'Profile')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card pt-4">
                <center>
                    <img class="rounded-circle avatar-xl" src="{{ asset('backend/assets/images/small/img-5.jpg') }}"
                        alt="Card image cap">
                </center>
                <div class="card-body">
                    <h4 class="card-title">Name: {{ $adminData->name }} </h4>
                    <hr>
                    <h5 class="card-title">Username: {{ $adminData->username }} </h5>
                    <hr>
                    <h5 class="card-title">Email: {{ $adminData->email }} </h5>
                    <hr>
                    <a href="{{ route('profile.edit') }}" class="btn btn-info waves-effect waves-light">Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
@endsection
