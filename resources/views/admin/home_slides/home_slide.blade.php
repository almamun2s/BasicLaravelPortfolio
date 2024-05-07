@extends('admin.admin_master')
@section('title', 'Edit Home Slide')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Home Slide</h4>

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

                    <h4 class="card-title">Edit Home Slide</h4>

                    <form action="{{ route('admin.home_slider_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" placeholder="e.g. I am a Web Developer"
                                    value="{{ $data->title }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="short_title" placeholder="e.g. I am a Full stack Web Developer."
                                    value="{{ $data->short_title }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=XHOmBV4js_E"
                                    value="{{ $data->video_url }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Slide image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="home_image" id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row
                                    mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{ $data->getHomeImg() }}" alt="Card image cap"
                                    id="showImage">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit" value="Update Slide">
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
