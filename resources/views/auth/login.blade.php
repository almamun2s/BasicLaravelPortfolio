@extends('admin.body.main_layout')
@section('title', 'Login')
@section('body_class', 'auth-body-bg')

@section('page_content')

    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    @include('auth.logo')
                    
                    <h4 class="text-muted text-center font-size-18"><b>Login</b></h4>

                    <div class="p-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

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

                            <!-- Remember Me -->
                            <div class="block mt-2">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span
                                        class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            <div class="form-group text-center row mt-1 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Login</button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-2">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    
                                    @endif
                                    <a href="{{ route('register') }}" class="text-muted">Don't have an account?</a>
                            </div>

                            {{-- <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="pages-login.html" class="text-muted">Already have account?</a>
                                </div>
                            </div> --}}
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
