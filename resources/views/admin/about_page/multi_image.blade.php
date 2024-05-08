@extends('admin.admin_master')
@section('title', 'Multi Image')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Images</h4>

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

                    <h4 class="card-title">Add Images</h4>

                    <form action="{{ route('admin.about_multi_image_update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">About image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" multiple name="multi_images[]" id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row
                    mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="" alt="Card image cap" id="showImage">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    value="Upload Multiple Images">
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Images</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>About Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $i++ }} </td>
                                    <td><img src="{{ $image->getMultiImg() }} " width="60px" height="50px"></td>
                                    <td>
                                        {{-- <a href="{{ route('admin.image_edit', $image->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a> --}}
                                        <a href="{{ route('admin.image_delete', $image->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
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
