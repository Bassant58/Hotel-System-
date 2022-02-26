<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function create()
    {
        return view('admin.login');// Login View Of Admin
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->intended('/All-dashboard');
            return redirect()->intended(RouteServiceProvider::HOME);
//            return 'gggggggggg';
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.blade');
    }
}
//if (Auth::guard('admin')->check())
//    $id = Auth::guard('admin')->user()->id;
//elseif (Auth::guard('manager')->check())
//    $id = Auth::guard('manager')->user()->id ;
