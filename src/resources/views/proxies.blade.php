@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Proxies') }}</h1>

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
                <table id="proxyTable" style="width:100%">
                    <thead>
                        <tr>
                            <td>proxy id</td>
                            <td>type</td>
                            <td>server</td>
                            <td>port</td>
                            <td>login</td>
                            <td>password</td>
                            <td>country</td>
                            <td>actions</td>
                        </tr>
                    </thead>
                    @foreach($proxies['data'] as $proxy)
                    <tr id="proxy-{{ $unit['id'] ?? null }}">
                        <td>{{ $proxy['id'] ?? null }}</td>
                        <td>{{ $proxy['type'] ?? null }}</td>
                        <td>{{ $proxy['server'] ?? null }}</td>
                        <td>{{ $proxy['port'] ?? null }}</td>
                        <td>{{ $proxy['login'] ?? null }}</td>
                        <td>{{ $proxy['password'] ?? null }}</td>
                        <td>{{ $proxy['country'] ?? null }}</td>
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