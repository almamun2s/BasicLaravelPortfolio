@extends('admin.admin_master')
@section('title', 'Contact Page')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Messages</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Messages</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Mobile</th>
                                <th>Message</th>
                                <th>Sent</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $i++ }} </td>
                                    <td>{{ $message->name }} </td>
                                    <td>{{ $message->email }} </td>
                                    <td>{{ $message->subject }} </td>
                                    <td>{{ $message->mobile }} </td>
                                    <td>{{ $message->message }} </td>
                                    <td>{{ $message->created_at->diffForHumans() }} </td>
                                    <td><a href="{{ route('admin.delete_message', $message->id) }}" id="delete"
                                            class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash"></i></a>
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
