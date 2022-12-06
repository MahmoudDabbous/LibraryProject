<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('registration.register');
    }

    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:10|max:100',
            'email' => 'required|email|min:10|max:100',
            'password' => 'required|string|min:6|max:30',
        ]);

        $login = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Mail::to($login->email)
        //     ->send(new RegisterUser());
        Auth::login($login);

        return redirect()->route('index');
    }


    public function login()
    {
        return view('registration.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:10|max:100',
            'password' => 'required|string|min:6|max:30',
        ]);

        $is_login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$is_login) {
            return back();
        }

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}