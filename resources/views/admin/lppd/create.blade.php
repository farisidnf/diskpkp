@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form id="postForm" name="postForm" class="form-horizontal" action="{{route('admin.lppd.store')}}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">


                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Pilih Tahun</label>
                    <div class="col-sm-12">
                        <select name="tahun" class="form-control" id="tahun">

                            @for ($i = 2020; $i < 2027; $i++)
                                <option {{ $i == date('Y') ? 'selected' : '' }} value="{{ $i }}">
                                    {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Nama <span style="color:brown;"></span></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama" name="nama"
                               placeholder="Nama" value="" required>
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
                @if (Auth::user()->role == 'admin')
                    <div class="form-group">
                        <label for="status" class="col-sm-12">Status</label>

                        <div class="col-sm-12">
                            <select name="status" id="bidang" class="form-control">
                                <option value="Menunggu Periksa">Menunggu Periksa</option>
                                <option value="Sedang Periksa">Sedang Periksa</option>
                                <option value="Ada Kesalahan">Ada Kesalahan</option>
                                <option value="Selesai">Selesai</option>
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

                <div class="form-group mt-3">
                    <a type="button" class="btn btn-secondary" href="{{route('admin.lppd.index')}}"
                       data-dismiss="modal">Batal</a>
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
