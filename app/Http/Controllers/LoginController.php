<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController 
{
    public function Login(){
        return view('Login');
    }

    public function DoLogin(){
        $input = ['email' => request('email'),'password' => request('password')];
        if(auth()->attempt($input,true)){
            return redirect()->route('indexpage');
        }else{
            return redirect()->route('loginpage')->with('message','invalid login');
        }
    }

    public function LogOut(){
        auth()->logout();
        return redirect()->route('loginpage');
    }
    
}
