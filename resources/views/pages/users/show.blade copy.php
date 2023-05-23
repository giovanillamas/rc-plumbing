@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Dashboard') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Dashboard') }}</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
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
