<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function LoginPage(){
        return view('login',['message'=>'','name'=>null]);
    }
    public function PostLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user = DB::table('userinfor')->where('email', $email)->first();
        if($user==null){
            return view('login',['err'=>'Wrong Email Or Password','name'=>'']);
        }
        if($user->Email==$email && $user->Password==$password){
            $request->session()->put(['user'=>$user->Name]);
            $request->session()->put(['role'=>$user->Role]);
            $request->session()->put(['email'=>$user->Email]);
            return redirect()->action('HomeController@GetHomePage');
        }

    }
}
