@extends('admin.admin_master')
@section('title', 'Edit Footer Section')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Footer Section</h4>

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

                    <h4 class="card-title">Edit footer section</h4>

                    <form action="{{ route('admin.footer_update') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="number" placeholder="e.g. 0123456789"
                                    value="{{ $footer->number }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="short_description" placeholder="Type your short Description here">{{ $footer->short_description }} </textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address" placeholder="Your address"
                                    value="{{ $footer->address }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" placeholder="Your Email"
                                    value="{{ $footer->email }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook url</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="facebook" placeholder="Your Facebook ID link"
                                    value="{{ $footer->facebook }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="twitter" placeholder="Your Twitter ID link"
                                    value="{{ $footer->twitter }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="copyright" placeholder="All &copy; right resorved by Abdullah Almamun"
                                    value="{{ $footer->copyright }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    value="Update Footer">
                            </div>
                        </div>
                        <!-- end row -->
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
