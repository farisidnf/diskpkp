@extends('admin.layouts.auth')

@section('main-content')
<style>
    #g-recaptcha-response {
        display: block !important;
        position: absolute;
        margin: -78px 0 0 0 !important;
        width: 302px !important;
        height: 76px !important;
        z-index: -999999;
        opacity: 0;
    }
</style>
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
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
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
                                    @if (session('success'))
                                        <div class="alert alert-icon alert-success alert-dismissible" role="alert">
                                            <i class="fas fa-exclamation-triangle mr-2" aria-hidden="true"></i>
                                            <!-- <button type="button" class="close" data-dismiss="alert"></button> -->
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                <form method="POST" action="{{ route('nkv-authenticate') }}" class="user">
                                         @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control form-control-user @error('username') is-invalid @enderror" value="" id="username" name="username" placeholder="Email" required>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                            <div class="position-relative d-flex align-items-center justify-content-end auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control form-control-user pe-5 password-input @error('password') is-invalid @enderror" name="password" placeholder="Enter password" id="password-input" value="" required>
                                                <button class="btn m-0 p-0 mr-3 password-addon position-absolute" type="button" id="password-addon"><i class="fas fa-eye"></i></button>
                                                <!-- @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror -->
                                            </div>
                                        </div>
                                        <div class="d-flex w-100 my-2">
                                            <div class="g-recaptcha" data-sitekey={{config('services.recaptcha.key')}}></div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-user btn-block btn-success" type="submit">Sign In</button>
                                            <a href="{{url('register')}}" class="btn btn-primary btn-user btn-block" type="submit">Register</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script async src="https://www.google.com/recaptcha/api.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
window.addEventListener('load', () => {
  const $recaptcha = document.querySelector('#g-recaptcha-response');
  if ($recaptcha) {
    $recaptcha.setAttribute('required', 'required');
  }
})
$('input[type=radio][name=kategori]').change(function() {
    kategori = this.value;
    window.location.href="{{url('register')}}?kategori="+kategori;
});
$(".password-addon").click(function() {
    if($("#password-input").attr("type")=="password"){
        $("#password-input").attr("type","text");
    }else{
        $("#password-input").attr("type","password");
    }
});
</script>
@endsection
