@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" placeholder="Judul Postingan" autocomplete="off" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        placeholder="Deskripsi" autocomplete="off" value="{{ old('description') }}" rows="8">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        <option value="" selected disabled>-- Pilih salah satu --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <select class="form-control @error('tag') is-invalid @enderror" name="tag">
                        <option value="" selected disabled>-- Pilih salah satu --</option>
                        @foreach ($tag as $item)
                            <option value="{{ $item->id }}" {{ old('tag') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}>{{ $item->content }}</option>
                        @endforeach
                    </select>
                    @error('tag')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"
                        id="thumbnail" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea id="editor" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                        value="{{ old('content') }}">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" id="publish" name="publish"
                        {{ old('publish') != null ? 'checked' : '' }}>
                    <label class="form-check-label" for="publish">
                        Publish
                    </label>
                    @error('publish')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-default">Kembali</a>

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
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script>
        var ckClassicEditor = document.querySelectorAll(".editor")
        ckClassicEditor.forEach(function () {
            ClassicEditor
                .create( document.querySelector( '.editor' ) )
                .then( function(editor) {
                    editor.ui.view.editable.element.style.height = '200px';
                } )
                .catch( function(error) {
                    console.error( error );
                } );
        });

    </script>
@endpush
