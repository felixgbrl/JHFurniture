<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',  
        ]);

        $tokenexpired = 60;

        $remember = $request['remember'];
      

        if($remember){
            if(Auth::attempt($credentials, true)){
                $request->session()->regenerate();
                Cookie::queue('email', $credentials['email'], $tokenexpired);
                Cookie::queue('password', $credentials['password'], $tokenexpired);
             
                return redirect()->intended('/');
            }
                return back()->with('loginError', 'login Failed!');
        }else{
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                Cookie::queue('email', $credentials['email'], -$tokenexpired);
                Cookie::queue('password', $credentials['password'], -$tokenexpired);
             
                return redirect()->intended('/');
            }
                return back()->with('loginError', 'login Failed!');
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return redirect('/');
    }

    

   
}
