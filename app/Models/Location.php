<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'longitude',
        'latitude',
        'name'
    ];

    public static function addUserLocation($request){
//        $users = Auth::user()->name;


        Location::create([
            'latitude'=>$request->latitude,
            'longitude'=>$request->latitude,
            'name'=>Auth::user()->name,
        ]);
    }
}
