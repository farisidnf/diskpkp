@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tahun') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('admin.year.create') }}" class="btn btn-primary mb-3">Buat Tahun Baru</a>

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
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($years as $year)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $year->year }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.year.edit', $year->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('admin.year.destroy', $year->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $years->links() }}
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
