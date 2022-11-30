<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('dashboard.login');
    }
    public function auth(Request $request)
    {
        $request->validate([

        'username' => 'required|exists:users,username',
        'password' => 'required'
        ],[
            'username.exists'=>"This user doesn't exists"
        ]);


    $user = $request->only('username', 'password');
    if(Auth::attempt($user)){
        return redirect()->route('todo.index');
    }else{
        return redirect('/')->with('fail', "Fail To Login");
    }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}