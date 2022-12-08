<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ipcontroller extends Controller
{
    public function ipc(){

//      $ip= request()->getClientIp();
////      echo $ip;
//      $publicIp = trim(shell_exec("dig @resolver4.opendns.com myip.opendns.com +short -4"));
//      echo $publicIp;
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        print_r($ip);



    }
}
