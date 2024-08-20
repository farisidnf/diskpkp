@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form id="postForm" name="postForm" class="form-horizontal" action="{{route('admin.sdi.store')}}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$post->id}}">


                @if (Auth::user()->role == 'admin')
                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Pilih Tahun</label>
                        <div class="col-sm-12">
                            <select name="tahun" class="form-control" id="tahun">

                                @for ($i = 2018; $i < 2029; $i++)
                                    :
                                    <option {{ (old('tahun', $post->tahun) == $i ||$i == date('Y')) ? 'selected' : '' }} value="{{ $i }}">
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Nama <span style="color:brown;"></span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama" name="nama"
                                   placeholder="Nama" value="{{old('nama', $post->nama)}}" required>
                        </div>
                    </div>


                    <div class="form-group" style="display:none;">
                        <label for="" class="col-sm-12">Sifat data </label>
                        <div class="col-sm-12">
                            <select name="sifat_data" id="sifat_data" class="form-control" style="width:350px;">
                                <option value="Public">Public</option>
                                <option value="Pribadi">Pribadi</option>
                            </select>
                        </div>
                    </div>


                @endif
                @if(Auth::user()->role == 'admin')
                    <div class="form-group">
                        <label for="status_" class="col-sm-12">Status</label>

                        <div class="col-sm-12">
                            <select name="status" id="status_" class="form-control">
                                <option value="Menunggu Periksa" {{ old('status', $post->status) == 'Menunggu Periksa' ? 'selected' : '' }}>
                                    Menunggu Periksa
                                </option>
                                <option value="Sedang Periksa" {{ old('status', $post->status) == 'Sedang Periksa' ? 'selected' : '' }}>
                                    Sedang Periksa
                                </option>
                                <option value="Ada Kesalahan" {{ old('status', $post->status) == 'Ada Kesalahan' ? 'selected' : '' }}>
                                    Ada Kesalahan
                                </option>
                                <option value="Selesai" {{ old('status', $post->status) == 'Selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                            </select>
                        </div>
                    </div>
                @endif


                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Upload (Maks 1,5 mb)</label>
                    <div class="col-sm-12">
                        <input type="file" name="upload_file" id="upload_file"/>
                    </div>
                </div>

                <div class="form-group">
                    <a type="button" class="btn btn-secondary" href="{{route('admin.sdi.index')}}" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary" id="savedata" value="create">Simpan
                    </button>
                </div>
            </form>
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
