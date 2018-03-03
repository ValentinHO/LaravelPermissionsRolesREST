<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    function index(){
    	$users = User::all();

    	$title = 'Listado de usuarios';
    	/*return view ('users.index')
    		->with('users', User::all())
    		->with('title', 'Listado de usuarios');*/

    	return view('users.index', compact('title','users'));
    }

    function new(){
    	return view('users.new');
    }

    function create(Request $request){

    	$data = $request->validate([
    		'name' => 'required',
    		'email' => ['required','email','unique:users,email'],
    		'password' => 'required'
    	],
    	[
    		'name.required' => 'El campo nombre es obligatorio',
    		'email.required' => 'El campo email es requerido',
            'email.email' => 'Ingrese un email válido',
    		'password.required' => 'El campo password es requerido'
    	]);
    	
    	User::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password'])
    	]);
    	return redirect()->route('users.index');;
    }

    function show(User $user){
    	
    	return view('users.show', compact('user'));
    }

    function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    function update(User $user){
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
    }

    function delete(User $user){
        $user->delete();

        return redirect()->route('users.index');
    }
}
