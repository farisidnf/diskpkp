@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master-indikator-program.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="year">Tujuan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           id="purpose"
                           placeholder="Masukkan Nama Indikator Program" autocomplete="off" value="{{ old('name') }}">
                    @error('purpose')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="button-action mt-3">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.master-indikator-program.index') }}" class="btn btn-default">Kembali</a>
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
