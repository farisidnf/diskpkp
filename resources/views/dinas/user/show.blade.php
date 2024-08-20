@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))
@section('main-content')
    <style>
        .form-check {
            padding-left: 2.25rem;
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
                <!-- <h5><b>Data Pengguna</b></h5>
                <hr> -->
                <center>
                    <h5><b>{{strtoupper($get_data->role)}}</b></h5>
                </center>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$get_data->username}}" disabled>
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$get_data->name}}" disabled>
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$get_data->username}}" disabled>
                        </div>
                    </div>
                </div>  
                @if($get_data->role=="pengusaha")
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">NIB</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$get_data->nib}}" disabled>
                        </div>
                    </div>
                </div>           
                @elseif($get_data->role=="sudin")
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Tujuan Permohonan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="Sudin KPKP {{$get_data->lokasi_sudin_r->lokasi}}" disabled>
                        </div>
                    </div>
                </div>    
                @endif
        </div>
    </div>
    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

@push('js')

@endpush
