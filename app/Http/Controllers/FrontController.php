<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class FrontController extends Controller
{
    public function index(){
        return view('home');
    }

    public function store(Request $request){


        Location::addUserLocation($request);
        return view('home');
    }


}
