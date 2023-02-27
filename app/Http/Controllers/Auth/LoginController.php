<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (auth()->attempt($request->only(['email', 'password']), $request->boolean('remember'))){
            return redirect()->intended('site.home'); // редирект куда собирался до авторизации
        }

        $request->session()->regenerate();

        return redirect()->route('login')->withInput()->withErrors([
            'email' => trans('auth.failed') // файл локализации
        ]);
    }


    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
