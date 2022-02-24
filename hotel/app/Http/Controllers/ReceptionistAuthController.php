<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionistAuthController extends Controller
{
    public function create()
    {
        return view('receptionest.login'); // Login View Of Receptionist
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('receptionist')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->intended(route('receptionist.dashboard'));
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('receptionist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('receptionist.login.blade'); // Route Receptionist Login
    }
}
