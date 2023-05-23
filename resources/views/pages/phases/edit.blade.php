@extends('adminlte::page')

@section('title', 'Phases')

@section('content_header')
    <h1>{{ __('Phases') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card">
            <form action="{{route('phases.update', $phase)}}" method="post">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Update') }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('phases.index') }}">Back</a>
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
                                    value="{{ old('name', $phase->name) }}" placeholder="Name" required>
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('phases.index') }}" class="btn btn-secondary">Cancel</a>
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
