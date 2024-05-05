@extends('admin.admin_master')
@section('title', 'Edit Profile')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Profile</h4>

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Profile Details</h4>

                    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="e.g. John Doe"
                                    value="{{ $adminData->name }}" >
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" placeholder="e.g. john@example.com"
                                    value="{{ $adminData->email }}" >
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="profile_pic" id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl"
                                    src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap" id="showImage">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit" value="Update Profile">
                            </div>
                        </div>
                        <!-- end row -->
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result );
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
