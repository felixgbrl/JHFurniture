<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    //

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);


        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect('/');

    }

    // public function login(Request $request){
    //     $login = $request->validate([
    //         'email' => 'required|email:dns',
    //         'password' => 'required'
    //     ]);


    //     if(Auth::attempt($login)){
    //         $request->session()->regenerate();

    //         return redirect('/');
    //     }

    // }


    public function login(Request $request){
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
