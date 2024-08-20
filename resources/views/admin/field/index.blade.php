@extends('admin.layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Fields') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.field.create') }}" class="btn btn-primary mb-4">{{ __('Create Field') }}</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fields as $field)
            <tr>
                <td>{{ $field->id }}</td>
                <td>{{ $field->name }}</td>
                <td>
                    <a href="{{ route('admin.field.edit', $field->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                    <form action="{{ route('admin.field.destroy', $field->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{ $fields->links() }}

@endsection