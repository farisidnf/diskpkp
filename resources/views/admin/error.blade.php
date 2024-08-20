@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')


<section class="section">
    {{-- <div class="section-header">
        <h1>Info</h1>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-options">
                        <h2 style="color:#e74c3c;">404 Bad Request</h2>
                        <h4>You don't have access for this page</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
