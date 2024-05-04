@extends('admin.main_layout')
@section('title', 'Recover Password')
@section('body_class', 'auth-body-bg')

@section('page_content')
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    @include('auth.logo')

                    <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                Enter Your <strong>E-mail</strong> and instructions will be sent to you!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                            <div class="form-group mb-3">
                                <div class="col-xs-12">
                                    <input class="form-control block mt-1 w-full" type="email"autofocus placeholder="Email" id="email" name="email">
                                    @error('email')
                                        <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group pb-2 text-center row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send
                                        Email</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->
@endsection
