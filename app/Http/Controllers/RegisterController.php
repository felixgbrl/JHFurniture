<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $registration = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95',
            'gender' => 'required|in:M,F'
        ]);

        $registration['role'] = 'Member';
        $registration['password'] = Hash::make($registration['password']);

        User::create($registration);

        $request->session()->flash('success_register', 'Registration Success! Please Login');

        return redirect('/login');
    }
}
