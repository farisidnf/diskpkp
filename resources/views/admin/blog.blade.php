@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Blog') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">Buat Postingan Baru</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-stripped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Kategori</th>
                        <th>Thumbnail</th>
                        <th>Konten</th>
                        <th>Tag</th>
                        <th>Tanggal Publish</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ substr($post->title, 0, 100) }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td><img src="{{ $post->thumbnail }}" width="100" height="100"></td>
                            <td>{{ substr($post->body, 0, 500) }}</td>
                            <td>{{ substr($post->tag->content, 0, 500) }}</td>
                            <td>{{ $post->published_at ? date('d M Y H:i:s',strtotime($post->published_at)) : '' }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.blog.edit', $post->slug) }}"
                                       class="btn btn-sm btn-primary mr-2">Edit</a>
                                    <form action="{{ route('admin.blog.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>

        </div>
    </div>
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
