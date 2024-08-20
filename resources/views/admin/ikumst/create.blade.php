@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ikumst.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                        <option value="">Pilih Tahun</option>
                        @for($tahun=now()->year ; $tahun >=2000 ; $tahun--)
                        <option value="{{$tahun}}">{{$tahun}}</option>
                        @endfor
                    </select>
                    @error('tahun')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
                        placeholder="Tuliskan Judul..." autocomplete="off" value="{{ old('judul') }}"
                        rows="8"></textarea>
                    @error('judul')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('ikumst.index') }}" class="btn btn-default">Kembali</a>

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
    <!-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script> -->
@endpush
