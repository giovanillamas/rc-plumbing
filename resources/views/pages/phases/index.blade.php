@extends('adminlte::page')

@section('title', 'Phases')

@section('content_header')
    <h1>{{ __('Phases') }}</h1>
@stop

@section('content')
    <div class="card p-1">
        <div class="card-header">
            <h3 class="card-title">{{ __('List') }}</h3>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('phases.create') }}">Register</a>
            </div>
        </div>
        <div class="card-body p-1">
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($phases as $phase)
                        <tr>
                            <td>{{ $phase->id }}</td>
                            <td>{{ $phase->name }}</td>
                            <td>
                                <a href="{{ route('phases.edit', $phase) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('phases.destroy', $phase) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@stop
