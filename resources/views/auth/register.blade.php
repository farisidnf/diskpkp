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
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
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

                                @if (session('danger'))
                                        <div class="alert alert-icon alert-danger alert-dismissible" role="alert">
                                            <i class="fe fe-check mr-2" aria-hidden="true"></i>
                                            <!-- <button type="button" class="close" data-dismiss="alert"></button> -->
                                            {{ session('danger') }}
                                        </div>
                                    @endif

                                <form method="POST" action="{{ route('register-save') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    
                                    <div class="kategori-pemohon mb-3">    
                                        <!-- <h4 class="mb-3">Kategori Pemohon</h4> -->
                                        <!-- <p>Pilih kategori pemohon, sesuai peruntukan permohonan sertifikat</p> -->
                                        <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="sektoral" name="kategori" {{$kategori=="sektoral" ? "checked" : ""}}>Sektoral
                                        </label>
                                        </div>
                                        <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="sudin" name="kategori" {{$kategori=="sudin" ? "checked" : ""}}>Sudin
                                        </label>
                                        </div>
                                        <div class="form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="perusahaan" name="kategori" {{$kategori=="perusahaan" ? "checked" : ""}}>Perusahaan
                                        </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for=""  class="form-label">Nama {{$kategori=='perusahaan' ? 'Perusahaan' : 'Lengkap'}}</label>
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nama {{$kategori=='perusahaan' ? 'Perusahaan' : 'Lengkap'}}" value="{{ old('name') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for=""  class="form-label">Email </label>
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    @if($kategori=="sektoral")
                                    
                                    <div class="form-group">
                                        <label for=""  class="form-label">NRK </label>
                                        <input type="text" class="form-control form-control-user" name="nrk" placeholder="NRK" value="{{ old('nrk') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for=""  class="form-label">Bidang </label>
                                        <select name="bidang" id="bidang" class="form-control" style="border-radius:10rem; height:50px;">
                                            @foreach ($bidangs as $bidang)
                                            <option value="{{$bidang->id}}">{{$bidang->nama}}</option>
                                            @endforeach
                                            <!-- <option value="pangan">Pangan</option>
                                            <option value="perikanan">Perikanan</option>
                                            <option value="pertanian">Pertanian</option>
                                            <option value="peternakan">Peternakan</option> -->
                                            {{-- <option value="sekretaris">Sekretaris (Admin DKPKP)</option> --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""  class="form-label">Jabatan </label>

                                        <input type="text" name="jabatan" class="form-control form-control-user" placeholder="Jabatan" value="{{ old('jabatan') }}" required value="">
                                    </div>
                                    @elseif($kategori=="sudin")
                                    <div class="form-group">
                                        <label for=""  class="form-label">Lokasi </label>
                                        <select required name="lokasi" id="lokasi" class="form-control" style="border-radius:10rem; height:50px;">
                                            @foreach($lokasisudin as $keylokasi)
                                            <option value="{{$keylokasi->id}}" {{ old('lokasi')==$keylokasi->id ? "selected" : "" }}>{{$keylokasi->lokasi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @elseif($kategori=="perusahaan")    
                                    <div class="form-group">
                                        <label for=""  class="form-label">NIB </label>
                                        <input type="text" class="form-control form-control-user" name="nib" placeholder="NIB" value="{{ old('nib') }}" required autofocus>
                                    </div>
                                    @endif
                                    
                                    <div class="form-group">
                                        <label for=""  class="form-label">Kata Sandi </label>
                                        <div class="position-relative d-flex align-items-center justify-content-end">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="{{ __('Kata Sandi') }}" value="{{ old('password') }}" required>
                                            <button class="btn m-0 p-0 mr-3 password-addon position-absolute" type="button" id="password-addon"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for=""  class="form-label">Konfirmasi Kata Sandi </label>
                                        <div class="position-relative d-flex align-items-center justify-content-end">
                                            <input type="password" class="form-control form-control-user" name="password_confirmation" id="password_confirmation" placeholder="{{ __('Kata Sandi') }}" value="{{ old('password_confirmation') }}" required>
                                            <button class="btn m-0 p-0 mr-3 password-addon position-absolute" type="button" id="password_confirmation-addon"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div> --}}
                                    <div class="d-flex w-100 my-2">
                                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Register
                                        </button>

                                        <a href="{{ url($urllogin) }}" class="btn btn-primary btn-user btn-block">Sign In </a>
                                    </div>

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

$("#password-addon").click(function() {
    if($("#password").attr("type")=="password"){
        $("#password").attr("type","text");
    }else{
        $("#password").attr("type","password");
    }
});

$("#password_confirmation-addon").click(function() {
    if($("#password_confirmation").attr("type")=="password"){
        $("#password_confirmation").attr("type","text");
    }else{
        $("#password_confirmation").attr("type","password");
    }
});
</script>
@endsection
