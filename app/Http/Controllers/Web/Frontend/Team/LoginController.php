<?php

namespace App\Http\Controllers\Web\Frontend\Team;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
        $this->middleware('guest:team')->except('logout');
    }
    
    public function index()
    {
        return view('app.frontend.pages.team.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('team.dashboard'));
        }
        
        return redirect()->back()->with('error', 'Email atau Password salah');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('team.login');
    }
}
