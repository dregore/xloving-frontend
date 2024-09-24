@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create Unit') }}</h1>

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

                <form method="POST" action="{{ route('units.store') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">

                    <h6 class="heading-small text-muted mb-4">Create new unit</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_id">Unit id</label>
                                    <input type="text" id="unit_id" class="form-control" name="unit_id" placeholder="1234">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_model">phone_model</label>
                                    <input type="text" id="phone_model" class="form-control" name="phone_model" placeholder="Huawei P70">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="location">location<span class="small text-danger">*</span></label>
                                    <input type="text" id="location" class="form-control" name="location" placeholder="US">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="version">version<span class="small text-danger">*</span></label>
                                    <input type="text" id="version" class="form-control" name="version" placeholder="1.2.3">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="comment">comment</label>
                                    <textarea type="text" id="comment" class="form-control" name="comment"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label">Blocked</label>
                                    <select class="form-control" name="blocked" id="blocked">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
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