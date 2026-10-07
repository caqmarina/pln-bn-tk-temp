<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email-username' => ['required'],
            'password' => ['required', 'string'],
        ]);

        $login = $request->input('email-username');

        $credentials = [
            'password' => $request->password,
        ];

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $login;
        } else {
            $credentials['name'] = $login;
        }

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email-username' => 'Email/username atau password salah.',
                ])
                ->onlyInput('email-username');
        }

        $request->session()->regenerate();

        return redirect()->intended('/content_plan');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth-login-basic');
    }
}