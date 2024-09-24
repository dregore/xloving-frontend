@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create Task') }}</h1>

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

                <form method="POST" action="{{ route('tasks.create') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">

                    <h6 class="heading-small text-muted mb-4">Create new task</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label">Task type</label>
                                    <select class="form-control" name="task_type" id="task_type">
                                        <option value="0">Choose</option>
                                        <option value="install">Install App</option>
                                        <option value="tiktok">Tiktok</option>
                                        <option value="youtube">Youtube</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="app_name">App name</label>
                                    <input type="text" id="app_name" class="form-control" name="app_name" placeholder="Live Wallpapers, 4K Wallpapers">
                                </div>
                            </div>
                            <div class="col-lg-4 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="app_bundle">App bundle<span class="small text-danger">*</span></label>
                                    <input type="text" id="app_bundle" class="form-control" name="app_bundle" placeholder="hd.uhd.live.wallpapers.topwallpapers">
                                </div>
                            </div>
                        </div>

                        <div class="row install" style="display: none;">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="attempts">Attempts</label>
                                    <input type="number" id="attempts" class="form-control" name="attempts" step="1" value="3">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="delay_min">Delay min</label>
                                    <input type="number" id="delay_min" class="form-control" name="delay_min" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="delay_max">Delay max</label>
                                    <input type="number" id="delay_max" class="form-control" name="delay_max" step="1" value="4">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="minutes">Minutes</label>
                                    <input type="number" id="minutes" class="form-control" name="minutes" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="seconds">Seconds</label>
                                    <input type="number" id="seconds" class="form-control" name="seconds" step="1" value="23">
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