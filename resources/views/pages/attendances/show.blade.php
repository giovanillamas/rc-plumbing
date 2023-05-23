@extends('adminlte::page')

@section('title', 'Attendance')

@section('content_header')
    <h1>{{ __('Attendance') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Attendance') }}</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{ route('attendances.index') }}">Back</a>
                </div>
            </div>
            <div class="card-body p-0">

                
            </div>
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
