@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit Proxy') }}</h1>

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
                <form method="POST" action="{{ route('proxies.update', $proxies->data->id) }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">Edit proxy {{$proxies->data->id}}</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="type">type</label>
                                    <input type="text" id="type" class="form-control" name="type" value="{{$proxies->data->type}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="server">server<span class="small text-danger">*</span></label>
                                    <input type="text" id="server" class="form-control" name="server" value="{{$proxies->data->server}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="port">port<span class="small text-danger">*</span></label>
                                    <input type="text" id="port" class="form-control" name="port" value="{{$proxies->data->port}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="login">login<span class="small text-danger">*</span></label>
                                    <input type="text" id="login" class="form-control" name="login" value="{{$proxies->data->login}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="password">password<span class="small text-danger">*</span></label>
                                    <input type="text" id="password" class="form-control" name="password" value="{{$proxies->data->password}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="country">country<span class="small text-danger">*</span></label>
                                    <input type="text" id="country" class="form-control" name="country" value="{{$proxies->data->country}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection