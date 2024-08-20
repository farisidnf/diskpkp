@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Indikator Kinerja Utama (IKU)') }}</h1>

    <!-- Main Content goes here -->
    @if(Auth::user()->role == 'admin')
    <a href="{{ route('ikumst.create') }}" class="btn btn-primary mb-3">Buat Indikator Kinerja Utama (IKU) Baru</a>
    @endif

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
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ikumsts as $ikumst)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $ikumst->tahun }}</td>
                        <td>{{ $ikumst->judul }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ url('ikudtl') }}/{{$ikumst->id}}" class="btn btn-sm btn-warning mr-2">Detail</a>
                                @if(Auth::user()->role == 'admin')
                                <a href="{{ route('ikumst.edit', $ikumst->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('ikumst.destroy', $ikumst->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Delete
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $ikumsts->links() }}
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
