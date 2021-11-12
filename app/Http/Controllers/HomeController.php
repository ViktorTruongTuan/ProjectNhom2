<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function GetHomePage(Request $request){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        return view('HOME',['role'=>$role,'name'=>$user]);
    }
}
