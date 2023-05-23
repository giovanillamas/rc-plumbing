@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>{{ __('Users') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card">
            <form action="{{route('users.update', $user)}}" method="post">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Update') }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
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
                                    value="{{ old('name', $user->name) }}" placeholder="Name" required>
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" class="form-control" name="lastname"
                                    value="{{ old('lastname', $user->lastname) }}" placeholder="Lastname" required>
                                @error('lastname')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" name="phone"
                                    value="{{ old('phone', $user->phone) }}" placeholder="Phone" required>
                                @error('phone')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="email">Email</label>
                                <input type="mail" id="email" class="form-control" name="email"
                                    value="{{ old('email', $user->email) }}" placeholder="Email" required>
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="street_number">Street number</label>
                                <input type="text" id="street_number" class="form-control" name="street_number"
                                    value="{{ old('street_number', $user->street_number) }}" placeholder="Street number" required>
                                @error('street_number')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="street_name">Street name</label>
                                <input type="text" id="street_name" class="form-control" name="street_name"
                                    value="{{ old('street_name', $user->street_name) }}" placeholder="Street name" required>
                                @error('street_name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="city">City</label>
                                <input type="text" id="city" class="form-control" name="city"
                                    value="{{ old('city', $user->city) }}" placeholder="City" required>
                                @error('city')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="state">State</label>
                                <input type="text" id="state" class="form-control" name="state"
                                    value="{{ old('state', $user->state) }}" placeholder="State" required>
                                @error('state')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="zip_code">Zip code</label>
                                <input type="text" id="zip_code" class="form-control" name="zip_code"
                                    value="{{ old('zip_code', $user->zip_code) }}" placeholder="Zip code" required>
                                @error('zip_code')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="ssn">SSN</label>
                                <input type="text" id="ssn" class="form-control" name="ssn"
                                    value="{{ old('ssn', $user->ssn) }}" placeholder="SSN" required>
                                @error('ssn')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="status">Status</label>
                                <select id="status" class="form-control custom-select" name="status" required>
                                    <option {{ old('status', $user->status) == 'active' ? 'selected' : '' }} value="active">Active</option>
                                    <option {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }} value="inactive">Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="role_id">Role</label>
                                <select id="role_id" name="role_id" class="form-control custom-select">
                                    @foreach ($roles as $role)
                                        <option {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{ old('password', $user->password) }}" placeholder="Password" required>
                                @error('password')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
    
                        </div>
                    </div>
    
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
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
