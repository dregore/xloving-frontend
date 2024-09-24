@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit Account') }}</h1>

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
                <form method="POST" action="{{ route('accounts.update', $accounts->data->id) }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">Edit account {{$accounts->data->id}}</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label">Account type<span class="small text-danger">*</span></label>
                                    <select class="form-control" name="account_type" id="account_type">
                                        @foreach($types as $value)
                                        <option value="{{ $value }}" {{ $accounts->data->type == $value ? 'selected' : '' }}>{{ ucfirst($value) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="server">Email<span class="small text-danger">*</span></label>
                                    <input type="text" id="account_email" class="form-control" name="account_email" value="{{$accounts->data->email}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="port">Password<span class="small text-danger">*</span></label>
                                    <input type="text" id="account_password" class="form-control" name="account_password" value="{{$accounts->data->password}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="login">Backup Email<span class="small text-danger">*</span></label>
                                    <input type="text" id="account_backup" class="form-control" name="account_backup" value="{{$accounts->data->backup_email}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="country">country<span class="small text-danger">*</span></label>
                                    <input type="text" id="country" class="form-control" name="country" value="{{$accounts->data->country}}">
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