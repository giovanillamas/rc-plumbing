@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>{{ __('Users') }}</h1>
@stop

@section('content')
    <div class="card p-1">
        <div class="card-header">
            <h3 class="card-title">{{ __('List') }}</h3>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('users.create') }}">Register</a>
            </div>
        </div>
        <div class="card-body p-1">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Name', 'Lastname', 'Phone', 'Email', 'Address', 'SSN', 'Status', 'Role', 'Actions'];
                
            @endphp

            {{-- Minimal example / fill data using the component slot --}}

            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>SSN</th>
                        <th>Status</th>
                        <th>Rol</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->street_number }} {{ $user->street_name }} {{ $user->city }}
                                {{ $user->state }} {{ $user->zip_code }}</td>
                            <td>{{ $user->ssn }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                {{-- <a href="{{ route('users.show', $user->id) }}"
                                class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
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
