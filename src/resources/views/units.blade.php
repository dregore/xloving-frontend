@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Units') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-12 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-body">
                <table id="unitTable" style="width:100%">
                    <thead>
                        <tr>
                            <td>unit id</td>
                            <td>phone_model</td>
                            <td>location</td>
                            <td>version</td>
                            <td>comment</td>
                            <td>blocked</td>
                            <td>last_seen</td>
                            <td>created_at</td>
                            <td>updated_at</td>
                            <td>actions</td>
                        </tr>
                    </thead>
                    @foreach($units['data'] as $unit)
                    <tr id="unit-{{ $unit['id'] ?? null }}">
                        <td>{{ $unit['unit_id'] ?? null }}</td>
                        <td>{{ $unit['phone_model'] ?? null }}</td>
                        <td>{{ $unit['location'] ?? null }}</td>
                        <td>{{ $unit['version'] ?? null }}</td>
                        <td>{{ $unit['comment'] ?? null }}</td>
                        <td>{{ $unit['blocked'] == 0 ? 'No' : 'Yes' }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($unit['last_seen'])) ?? null }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($unit['created_at'])) ?? null }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($unit['updated_at'])) ?? null }}</td>
                        <td>
                            <button class="btn btn-info btn-edit" type="button">Edit</button>
                            <button class="btn btn-danger btn-delete" type="button">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>

@endsection