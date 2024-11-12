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
                            <td>delay min</td>
                            <td>delay max</td>
                            <td>app name</td>
                            <td>app bundle</td>
                            <td>delete</td>
                            <td>minutes</td>
                            <td>seconds</td>
                            <td>like</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection