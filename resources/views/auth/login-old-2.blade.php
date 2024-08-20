@extends('admin.layouts.auth')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <img src="{{ asset('img/logo-login.png') }}" alt="logo-img"
                                        class="m-auto d-none d-lg-block" width="122;" height="122;" loading="lazy">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger border-left-danger" role="alert">
                                            <ul class="pl-4 my-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif




                                    <form method="POST" action="{{ route('authenticate') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <input type="test" class="form-control form-control-user" name="username"
                                                placeholder="Username" value="{{ old('username') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                placeholder="{{ __('Password') }}" required>
                                        </div>

                                        <div class="d-flex w-100 my-2">
                                            <div class="g-recaptcha" data-sitekey={{config('services.recaptcha.key')}}></div>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                        </div>

                                        <br />

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>

                                            <a href="{{ url('/register') }}" style="background: #ffffff; color:#5d8e88;"
                                                class="btn btn-primary btn-user btn-block">Register </a>
                                        </div>


                                        {{-- <a href="{{ url('/register') }}" style="color:blue;">Registration page</a> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script async src="https://www.google.com/recaptcha/api.js"></script>

@endsection
