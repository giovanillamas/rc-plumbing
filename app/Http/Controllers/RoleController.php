<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }

    public function create(){

        return view('pages.roles.create');

    }

    public function show(Role $role){
        return view('pages.roles.show', compact('role'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);
        
        $role = Role::create($request->all());

        return redirect(route('roles.index'));

    }

    public function edit(Role $role){

        $roles = Role::all();

        return view('pages.roles.edit', compact('role', 'roles'));

    }

    public function update(Request $request, Role $role){
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        return redirect(route('roles.index'));

    }

    public function destroy(Role $role){

        $role->delete();
        return redirect(route('roles.index'));
    }
}
