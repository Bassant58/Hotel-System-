<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionistAuthController extends Controller
{
    public function create()
    {
        return view('auth.receptionistLogin'); // Login View Of Receptionist
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('receptionist')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('receptionist.dashboard'));
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('receptionist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('receptionist.login'); // Route Receptionist Login
    }
}
