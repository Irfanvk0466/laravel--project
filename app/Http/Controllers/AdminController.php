<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
   public function AdminLogin(){
        return view('Adminlogin');
    }

    public function AdminDoLogin(){

        $input = ['email' => request('email'),'password' => request('password')];
        if(auth()->guard('admin')->attempt($input,true)){
            return redirect()->route('adminwelcomepage');
        }else{
            return redirect()->route('adminpage')->with('message','invalid login');
        }
    }

    public function LogOut(){
        auth()->logout();
        return redirect()->route('adminpage');
    }

    public function Adminwelcome(){
        $users = User::withCount('orders')->withTrashed()->active()->latest()->paginate(5);
        return view('Adminwelcome',compact('users'));
    }

   
    
}
