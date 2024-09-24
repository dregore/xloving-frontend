@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Tasks') }}</h1>

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
                <table id="taskTable" style="width:100%">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>unit id</td>
                            <td>status</td>
                            <td>type</td>
                            <td>attempts</td>
                            <td>delay_min</td>
                            <td>delay_max</td>
                            <td>app_name</td>
                            <td>app_bundle</td>
                            <td>delete</td>
                            <td>minutes</td>
                            <td>seconds</td>
                            <td>like</td>
                        </tr>
                    </thead>
                    @foreach($tasks['data'] as $task)
                    <tr>
                        <td>{{ $task['task']['id'] ?? null }}</td>
                        <td>{{ $task['task']['unit_id'] ?? null }}</td>
                        <td>{{ $task['task']['status'] ?? null }}</td>
                        <td>{{ $task['task']['type'] ?? null }}</td>
                        <td>{{ $task['task']['attempts'] ?? null }}</td>
                        <td>{{ $task['task']['delay_min'] ?? null }}</td>
                        <td>{{ $task['task']['delay_max'] ?? null }}</td>
                        <td>{{ $task['task']['app_name'] ?? null }}</td>
                        <td>{{ $task['task']['app_bundle'] ?? null }}</td>
                        <td>{{ $task['task']['delete'] ?? null }}</td>
                        <td>{{ $task['task']['minutes'] ?? null }}</td>
                        <td>{{ $task['task']['seconds'] ?? null }}</td>
                        <td>{{ $task['task']['like'] ?? null }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>

@endsection