@extends('admin.admin_master')
@section('title', 'Blog Category')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Blog Category</h4>

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

                    <h4 class="card-title">Add Category</h4>

                    <form action="{{ route('admin.add_blog_category') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="Web Development">
                                @error('name')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                    value="Add Category">
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

                    <h4 class="card-title">All Categories</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach ($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $i++ }} </td>
                                    <td>{{ $blogCategory->name }} </td>
                                    <td>
                                        <a href="{{ route('admin.edit_blog_category', $blogCategory->id ) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.delete_blog_category', $blogCategory->id ) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i
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

@endsection
