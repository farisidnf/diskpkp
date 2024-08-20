@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.ppidkategori.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="fk_ppid_navbar">PPID Navbar<span class="text-danger">*</span></label>
                    <select class="type-select form-control @error('fk_ppid_navbar') is-invalid @enderror" name="fk_ppid_navbar" id="fk_ppid_navbar">
                        <option value="">Pilih PPID Navbar</option>
                        @foreach($ppidnavbar as $datappidnavbar)
                        <option value="{{$datappidnavbar->id}}">{{$datappidnavbar->nama}}</option>
                        @endforeach
                    </select>
                    @error('fk_ppid_navbar')
                        <span class="text-danger">PPID Navbar harus diisi</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <textarea class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                        placeholder="Tuliskan nama kategori baru" autocomplete="off" value="{{ old('nama') }}"
                        rows="8"></textarea>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.ppidkategori.index') }}" class="btn btn-default">Kembali</a>

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
