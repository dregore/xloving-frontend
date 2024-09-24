@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Accounts') }}</h1>

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
                <table id="accountTable" style="width:100%">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>type</td>
                            <td>email</td>
                            <td>password</td>
                            <td>country</td>
                            <td>created_at</td>
                            <td>updated_at</td>
                            <td>backup_email</td>
                            <td>actions</td>
                        </tr>
                    </thead>
                    @foreach($accounts['data'] as $item)
                    <tr id="account-{{ $item['id'] ?? null }}">
                        <td>{{ $item['id'] ?? null }}</td>
                        <td>{{ $item['type'] ?? null }}</td>
                        <td>{{ $item['email'] ?? null }}</td>
                        <td>{{ $item['password'] ?? null }}</td>
                        <td>{{ $item['country'] ?? null }}</td>
                        <td>{{ $item['created_at'] ?? null }}</td>
                        <td>{{ $item['updated_at'] ?? null }}</td>
                        <td>{{ $item['backup_email'] ?? null }}</td>
                        <!-- <td>{{ $item['unit_id'] ?? null }}</td> -->
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