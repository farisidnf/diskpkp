@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.ppidinformasi.update', $ppidinformasi->id) }}" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="fk_ppid_kategori">PPID Kategori<span class="text-danger">*</span></label>
                    <select class="type-select form-control @error('fk_ppid_kategori') is-invalid @enderror" name="fk_ppid_kategori" id="fk_ppid_kategori">
                        <option value="">Pilih PPID Navbar</option>
                        @foreach($ppidkategori as $datappidkategori)
                        <option value="{{$datappidkategori->id}}" {{$datappidkategori->id==$ppidinformasi->fk_ppid_kategori ? 'selected' : ''}}>{{$datappidkategori->nama}}</option>
                        @endforeach
                    </select>
                    @error('fk_ppid_kategori')
                        <span class="text-danger">PPID Kategori harus diisi</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                        placeholder="Tuliskan nama informasi baru" autocomplete="off"
                        value="{{ old('nama') ?? $ppidinformasi->nama }}" rows="8">{{old('nama', $ppidinformasi->nama)}}</textarea>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file_informasi">File<span class="text-danger">*</span></label>
                    @if($ppidinformasi->file_informasi)
                    <small><a target="_blank" href="{{asset($ppidinformasi->file_informasi)}}">Lihat File Sebelumnya</a></small>
                    @endif
                    <input class="form-control @error('file_informasi') is-invalid @enderror" type="file" name="file_informasi" id="file_informasi">
                    @error('file_informasi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.ppidinformasi.index') }}" class="btn btn-default">Kembali</a>

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
