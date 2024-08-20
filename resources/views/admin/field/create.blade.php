@extends('admin.layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Field') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.field.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Field Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </form>
@endsection
