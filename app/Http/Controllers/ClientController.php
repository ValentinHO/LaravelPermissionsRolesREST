<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function index(){
    	$clients = Client::where('user_id', Auth::user()->id)->get();

    	return view('apiviews.client', compact('clients'));
    }
}
