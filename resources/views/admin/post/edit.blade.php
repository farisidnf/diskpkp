@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blog.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" placeholder="Judul Postingan" autocomplete="off"
                        value="{{ old('title') ?? $post->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        placeholder="Deskripsi" autocomplete="off" value="{{ old('description') ?? $post->description }}" rows="8">{{ old('description') ?? $post->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        <option value="" selected disabled>-- Pilih salah satu --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'selected' : '' }}>
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
                            <option value="{{ $item->id }}" {{ $item->id == $post->tag_id ? 'selected' : '' }}>
                                {{ $item->content }}</option>
                        @endforeach
                    </select>
                    @error('tag')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"
                        id="thumbnail">
                    @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea id="editor" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                        rows="8" autocomplete="off" value="{{ old('content') ?? $post->body }}">{{ old('content') ?? $post->body }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" id="publish" name="publish"
                        {{ $post->publish == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="publish">
                        Publish
                    </label>
                    @error('publish')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Tanggal Publish</label>
                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                           id="title" placeholder="Tanggal Postingan" autocomplete="off"
                           value="{{ old('published_at') ?? $post->published_at }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex flex-column mt-2">
                    <label for="image-preview">Thumbnail Preview</label>
                    <img src="{{ $post->thumbnail }}" alt="{{ $post->slug }}"
                        style="height: 300px; width: 400px; object-fit: contain">
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

@section('js')
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
