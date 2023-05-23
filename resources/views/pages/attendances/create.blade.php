@extends('adminlte::page')

@section('title', 'Attendances')

@section('content_header')
    <h1>{{ __('Attendances') }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('attendances.store') }}" method="post">
            <div class="card-header">
                <h3 class="card-title">{{ __('Create') }}</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{ route('attendances.index') }}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @csrf
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="date_in">Date in</label>
                            <input type="date" id="date_in" class="form-control" name="date_in"
                                value="{{ old('date_in', date("Y-m-d")) }}" placeholder="Date in" required>
                            @error('date_in')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="time_in">Time in</label>
                            <input type="time" id="time_in" class="form-control" name="time_in"
                                value="{{ old('time_in', '06:00') }}" placeholder="Time in" required>
                            @error('time_in')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="date_out">Date out</label>
                            <input type="date" id="date_out" class="form-control" name="date_out"
                                value="{{ old('date_out', date("Y-m-d")) }}" placeholder="Date out" required>
                            @error('date_out')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="time_out">Time out</label>
                            <input type="time" id="time_out" class="form-control" name="time_out"
                                value="{{ old('time_out', '17:00') }}" placeholder="Time out" required>
                            @error('time_out')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="incidence_id">Incidence</label>
                            <select id="incidence_id" name="incidence_id" class="form-control custom-select">
                                @foreach ($incidences as $incidence)
                                    <option {{ old('incidence_id') == $incidence->id ? 'selected' : '' }}
                                        value="{{ $incidence->id }}">{{ $incidence->name }}</option>
                                @endforeach
                            </select>
                            @error('incidence_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="user_id">User</label>
                            <select id="user_id" name="user_id" class="form-control custom-select" required>
                                <option value="">Select</option>
                                @foreach ($users as $user)
                                    <option {{ old('user_id') == $user->id ? 'selected' : '' }}
                                        value="{{ $user->id }}">{{ $user->name . ' ' . $user->lastname }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="project_id">Project</label>
                            <select id="project_id" name="project_id" class="form-control custom-select" required>
                                <option value="">Select</option>
                                @foreach ($projects as $project)
                                    <option {{ old('project_id') == $project->id ? 'selected' : '' }}
                                        value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Register" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
