@extends('admin.main_layout')
@section('title', 'Register')
@section('body_class', 'auth-body-bg')

@section('page_content')

    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30"
                                    class="logo-dark mx-auto" alt="">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30"
                                    class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                    <div class="p-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- Neme --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" placeholder="Name" name="name"
                                        value="{{ old('name') }}" autofocus autocomplete="name">
                                    @error('name')
                                        <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                    @enderror

                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="email" placeholder="Email" name="email"
                                        value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Username --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" placeholder="Username" name="username"
                                        value="{{ old('username') }}" autocomplete="username">
                                    @error('username')
                                        <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                    @error('password')
                                        <p class="text-danger mt-2 mb-0">{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password Confirmation --}}
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" placeholder="Confirm Password"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a
                                                href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
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
