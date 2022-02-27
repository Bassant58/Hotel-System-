<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ban
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('receptionist')->check()) {
            if (Auth::guard('receptionist')->user()->Ban_unBan == 'Ban') {
                Auth::guard('receptionist')->logout();
                return redirect()->route('receptionist.login.blade')
                    ->withErrors(['error' => 'You are banned']);
            }
            else {
                return $next($request);
            }
    }else{
            return $next($request);
        }
    }

}
