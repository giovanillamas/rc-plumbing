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
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->street_number }} {{ $user->street_name }} {{ $user->city }} {{ $user->state }}
                            {{ $user->zip_code }}</td>
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
            </x-adminlte-datatable>
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
