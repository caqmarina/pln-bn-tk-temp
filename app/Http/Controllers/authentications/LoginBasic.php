<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email-username' => 'required',
            'password' => 'required',
        ]);

        $login = $request->input('email-username');

        $credentials = [
            'password' => $request->password,
        ];

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $login;
        } else {
<<<<<<< HEAD
            $credentials['nip'] = $login;
=======
            $credentials['name'] = $login;
>>>>>>> 3ad159c (used laravel pint to ensure code formatting and consistency across the project)
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard-analytics');
        }

        return back()->withErrors([
<<<<<<< HEAD
            'email-username' => 'Email/NIP atau password salah.',
=======
            'email-username' => 'Email atau password salah.',
>>>>>>> 3ad159c (used laravel pint to ensure code formatting and consistency across the project)
        ])->onlyInput('email-username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth-login-basic');
    }
}
