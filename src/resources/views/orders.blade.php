@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Orders') }}</h1>

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
                <table id="orderTable" style="width:100%">
                    <thead>
                        <tr>
                            <td>id</td>
                            <!-- <td>unit id</td> -->
                            <!-- <td>status</td> -->
                            <td>amount</td>
                            <td>type</td>
                            <td>Fill type</td>
                            <td>delay_min</td>
                            <td>delay_max</td>
                            <td>app_name</td>
                            <td>app_bundle</td>
                            <td>url</td>
                            <td>delete</td>
                            <td>minutes</td>
                            <td>seconds</td>
                            <td>like</td>
                            <td>Deeplink</td>
                            <td>actions</td>
                        </tr>
                    </thead>
                    @foreach($orders as $order)
                    <tr id="order-{{ $order['id'] ?? null }}">
                        <td>{{ $order['id'] ?? null }}</td>
                        <!-- <td>{{ $order['unit_id'] ?? null }}</td> -->
                        <!-- <td>{{ $order['status'] ?? null }}</td> -->
                        <td>{{ $order['amount'] ?? null }}</td>
                        <td>{{ $order['type'] ?? null }}</td>
                        <td>{{ $order['fill_type'] ?? null }}</td>
                        <td>{{ $order['delay_min'] ?? null }}</td>
                        <td>{{ $order['delay_max'] ?? null }}</td>
                        <td>{{ $order['app_name'] ?? null }}</td>
                        <td>{{ $order['app_bundle'] ?? null }}</td>
                        <td>{{ $order['url'] ?? null }}</td>
                        <td>{{ $order['delete'] ?? null }}</td>
                        <td>{{ $order['minutes'] ?? null }}</td>
                        <td>{{ $order['seconds'] ?? null }}</td>
                        <td>{{ $order['like'] ?? null }}</td>
                        <td>{{ $order['deeplink_page'] ?? null }}</td>
                        <td>
                            <!-- <button class="btn btn-info btn-edit" type="button">Edit</button> -->
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