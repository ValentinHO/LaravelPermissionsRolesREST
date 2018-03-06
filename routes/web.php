<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::middleware(['auth'])->group(function()
{
		
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/client', 'ClientController@index');

		//USUARIOS
		
		Route::get('/usuarios', 'UserController@index')->name('users.index')
			->middleware('permission:users.index');

		Route::get('/usuarios/new', 'UserController@new')->name('users.new')
			->middleware('permission:users.new');

		Route::get('/usuarios/{user}', 'UserController@show')->name('users.show')
			->middleware('permission:users.show');

		Route::post('/usuarios', 'UserController@create')->name('users.create')
			->middleware('permission:users.new');

		Route::get('/usuarios/{user}/edit', 'UserController@edit')->name('users.edit')
			->middleware('permission:users.edit');

		Route::put('/usuarios/{user}', 'UserController@update')->name('users.update')
			->middleware('permission:users.edit');
		
		Route::delete('/usuarios/{user}', 'UserController@delete')->name('users.delete')
			->middleware('permission:users.delete');


		//ROLES
		Route::get('/roles', 'RoleController@index')->name('roles.index')
			->middleware('permission:roles.index');

		Route::get('/roles/new', 'RoleController@new')->name('roles.new')
			->middleware('permission:roles.new');

		Route::get('/roles/{role}', 'RoleController@show')->name('roles.show')
			->middleware('permission:roles.show');

		Route::post('/roles', 'RoleController@create')->name('roles.create')
			->middleware('permission:roles.new');

		Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
			->middleware('permission:roles.edit');

		Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')
			->middleware('permission:roles.edit');

		Route::delete('/roles/{role}', 'RoleController@delete')->name('roles.delete')
			->middleware('permission:roles.delete');


		//SITIOS

		Route::get('/sites', 'SiteController@index')->name('sites.index')
			->middleware('permission:sites.index');

		Route::get('/sites/new', 'SiteController@new')->name('sites.new')
			->middleware('permission:sites.new');

		Route::get('/sites/{site}', 'SiteController@show')->name('sites.show')
			->middleware('permission:sites.show');

		Route::post('/sites', 'SiteController@create')->name('sites.create')
			->middleware('permission:sites.new');

		Route::get('/sites/{site}/edit', 'SiteController@edit')->name('sites.edit')
			->middleware('permission:sites.edit');

		Route::put('/sites/{site}', 'SiteController@update')->name('sites.update')
			->middleware('permission:sites.edit');

		Route::delete('/sites/{site}', 'SiteController@delete')->name('sites.delete')
			->middleware('permission:sites.delete');

});
