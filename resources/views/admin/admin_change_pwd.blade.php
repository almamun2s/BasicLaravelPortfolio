@extends('admin.admin_master')
@section('title', 'Change Password')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Change Password</h4>

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

                    <h4 class="card-title">Change Password</h4>

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="current_password">
                                @error('current_password')
                                    <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                    <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    value="Change Password">
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
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
