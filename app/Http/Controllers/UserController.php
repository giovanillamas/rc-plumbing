<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function create(){

        $roles = Role::all();
        return view('pages.users.create', compact('roles'));

    }

    public function show(User $user){
        return view('pages.users.show', compact('user'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'street_number' => $request->street_number,
            'street_name' => $request->street_name,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'ssn' => $request->ssn,
            'status' => $request->status,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('users.index', $user));

    }

    public function edit(User $user){

        $roles = Role::all();

        return view('pages.users.edit', compact('user', 'roles'));

    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->update($request->all());

        return redirect(route('users.index', $user));

    }

    public function destroy(User $user){

        $user->delete();
        return redirect(route('users.index'));
    }
}
