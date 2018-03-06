<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Illuminate\Validation\Rule;

class SiteController extends Controller
{
    function index(){
    	$sites = Site::all();
    	$title = "Lista de Sitios";
    	return view('sites.index',compact('sites','title'));
    }

    function new(){
    	return view('sites.new');
    }

    function create(Request $request){
    	$data = $request->validate([
    		'site' => 'required',
    		'lat' => 'required',
    		'lng' => 'required'
    	],
    	[
    		'site.required' => 'El campo Sitio es obligatorio',
    		'lat.required' => 'El campo Lat es requerido',
            'lng.required' => 'El campo Lng es requerido',
    	]);

    	Site::create([
    		'site'=>$data['site'],
    		'lat'=>$data['lat'],
    		'lng'=>$data['lng']
    	]);

    	return redirect()->route('sites.index');
    }

    function show(Site $site){
    	return view('sites.show',['site'=>$site]);
    }

    function edit(Site $site){
    	return view('sites.edit',['site'=>$site]);
    }

    function update(Site $site){
    	$data = request()->validate([
    		'site' => 'required',
    		'lat' => 'required',
    		'lng' => 'required'
    	],
    	[
    		'site.required' => 'El campo Sitio es obligatorio',
    		'lat.required' => 'El campo Lat es requerido',
            'lng.required' => 'El campo Lng es requerido',
    	]);

    	$site->update($data);

    	return redirect()->route('sites.show', ['site' => $site]);
    }

    function destroy(Site $site){
    	$site->delete();

        return redirect()->route('sites.index');
    }
}
