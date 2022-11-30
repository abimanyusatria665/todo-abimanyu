<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Login;

class RegisterController extends Controller
{
    public function register(){
        return view('dashboard.register');
    }
    public function inputRegister(Request $request){
        $request->validate([
        'username' => 'required',
        'email' => 'required',
        'name' => 'required',
        'password' => 'required'
    ]);    
    User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email'=> $request->email,
        'password' => Hash::make($request->password),
    ]);
    return redirect('/')->with('success', 'successfully creating account');
}
}

