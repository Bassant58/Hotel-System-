<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function create()
    {
        return view('manager.login'); // Login View Of Manager
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->intended(route('manager.dashboard'));
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('manager')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('manager.login.blade'); // Route Manager Login
    }
}
