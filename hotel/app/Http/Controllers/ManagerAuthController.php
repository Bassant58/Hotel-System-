<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function create()
    {
        return view('auth.ManagerLogin'); // Login View Of Manager
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('manager.dashboard'));
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('manager')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('manager.login'); // Route Manager Login
    }
}
