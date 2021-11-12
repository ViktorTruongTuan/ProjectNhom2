<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function UserListPage(Request $request){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        return view('Admin-UserList',['role'=>$role,'name'=>$user]);

    }
}
