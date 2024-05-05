@extends('admin.admin_master')
@section('title', 'Profile')

@section('admin')
    <div class="row">
        <div class="col-lg-6">
            <div class="card pt-4">
                <center>
                    <img class="rounded-circle avater-x1" src="{{ asset('backend/assets/images/small/img-5.jpg') }}"
                        alt="Card image cap" width="300px">
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
