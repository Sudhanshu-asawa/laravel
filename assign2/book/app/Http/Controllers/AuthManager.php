<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');

    }
    function signup(){
        return view('signup');
    }
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect()->intended(route('view'));
        }
        return redirect(route('login'))->with('error','Invalid Credentials');
    }

    function signupPost(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user){
            return redirect(route('signup'))->with('error','Registration Failed, Try Again');
        }
        return redirect(route('login'))->with('success','Registration Successful');
    }
    function logout(){

        Auth::logout();
        return redirect(route('login'));
    }
}
