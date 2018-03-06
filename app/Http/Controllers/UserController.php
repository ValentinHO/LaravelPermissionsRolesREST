<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    function getToken(Request $request){
        if ($request->isJson()) {
            try {
                $data = $request->json()->all();
                $user = User::where('email',$data['email'])->first();

                //Verificamos que exista el usuario y por lo tanto la contraseña sea la correcta
                if($user && Hash::check($data['password'],$user->password)){

                    return response()->json([
                        'id'=>$user->id,
                        'name'=>$user->name,
                        'email'=>$user->email,
                        'token'=>$user->createToken($user->name)->accessToken
                    ],200);
                }else{
                    return response()->json(['error'=>'No content.'],406);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['error'=>'No content'],406);
            }
        }

        return response()->json(['error'=>'Unauthorized'],401);
    }
}
