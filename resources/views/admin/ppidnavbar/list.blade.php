@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('PPID') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('admin.ppidnavbar.create') }}" class="btn btn-primary mb-3">Buat Navbar Baru</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Navbar</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ppidnavbars as $ppidnavbar)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $ppidnavbar->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.ppidnavbar.edit', $ppidnavbar->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('admin.ppidnavbar.destroy', $ppidnavbar->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $ppidnavbars->links() }}
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
