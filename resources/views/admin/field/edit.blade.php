@extends('admin.layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Field') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.field.update', $field->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('Field Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $field->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
@endsection