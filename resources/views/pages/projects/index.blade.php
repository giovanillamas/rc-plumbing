@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1>{{ __('Projects') }}</h1>
@stop

@section('content')
    <div class="card p-1">
        <div class="card-header">
            <h3 class="card-title">{{ __('List') }}</h3>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Register</a>
            </div>
        </div>
        <div class="card-body p-1">
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date of start</th>
                    <th>Date of finish</th>
                    <th>Status</th>
                    <th>Phase</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->start }}</td>
                            <td>{{ $project->finish }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->phase->name }}</td>
                            <td>
                                {{-- <a href="{{ route('projects.show', $project->id) }}"
                                class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a> --}}
                                <a href="{{ route('projects.edit', $project) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
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
