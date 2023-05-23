@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1>{{ __('Projects') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card">
            <form action="{{route('projects.update', $project)}}" method="post">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Update') }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('projects.index') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @csrf
                            @method('put')
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $project->name) }}" placeholder="Name" required>
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="start">Date of start</label>
                                <input type="date" id="start" class="form-control" name="start"
                                    value="{{ old('start', $project->start) }}" placeholder="Lastname" required>
                                @error('start')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="finish">Date of finish</label>
                                <input type="date" id="finish" class="form-control" name="finish"
                                    value="{{ old('finish', $project->finish) }}" placeholder="Phone" required>
                                @error('finish')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="status">Status</label>
                                <select id="status" class="form-control custom-select" name="status" required>
                                    <option {{ old('status', $project->status) == 'active' ? 'selected' : '' }} value="active">Active</option>
                                    <option {{ old('status', $project->status) == 'inactive' ? 'selected' : '' }} value="inactive">Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="phase_id">Phase</label>
                                <select id="phase_id" name="phase_id" class="form-control custom-select">
                                    @foreach ($phases as $phase)
                                        <option {{ old('phase_id', $project->phase_id) == $phase->id ? 'selected' : '' }}
                                            value="{{ $phase->id }}">{{ $phase->name }}</option>
                                    @endforeach
                                </select>
                                @error('phase_id')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                </div>
                <div class="card-footer">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
