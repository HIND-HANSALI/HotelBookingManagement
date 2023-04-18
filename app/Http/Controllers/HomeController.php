<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        dd('User usertype is: '.$usertype);
        if($usertype==1){
            return redirect()->route('dashboard');
            // return view('dashboard.index');
        }else{
            // return view('welcome');
            return redirect()->route('roomsWelcome');
        }
    }
}
