<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    function index(){
    	$roles = Role::all();

    	$title = 'Listado de roles';

    	return view('roles.index', compact('title','roles'));
    }

    function new(){
    	$permissions = Permission::all();
    	return view('roles.new', compact('permissions'));
    }

    function create(Request $request){

    	$data = $request->validate([
    		'name' => 'required',
    	],
    	[
    		'name.required' => 'El campo nombre es obligatorio',
    	]);

    	$role = Role::create([
    		'name'=>$request->name,
    		'description'=>$request->description
    	]);

    	$role->syncPermissions($request->permissions);
    	return redirect()->route('roles.index');;
    }

    function show(Role $role){
    	
    	return view('roles.show', compact('role'));
    }

    function edit(Role $role){
    	$permissions = Permission::get();

        return view('roles.edit', ['role' => $role,'permissions'=>$permissions]);
    }

    function update(Role $role){
        $data = request()->validate([
            'name' => 'required'
        ]);

        $role->update($data);
        $role->syncPermissions($data['permissions']);

        return redirect()->route('roles.show', ['role' => $role]);
    }

    function delete(Role $role){
        $role->delete();
        return redirect()->route('roles.index');
    }
}
