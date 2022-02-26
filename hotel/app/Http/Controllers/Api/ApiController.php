<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function login(Request $request)
    {

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['status_code' => 500, 'message' => 'Email or password not correct ']);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(
            ['status_code' => 200, 'token' => $token]
        );
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status_code' => 200, 'message' => 'Token deleted and you are now logout!!']);
    }

    
    public function getRooms(){
    
        $rooms =  DB::table('rooms')
         ->where('status', '=' , 'available')
         ->get();
         return response()->json(['status_code' => 200, 'rooms' => $rooms]);
     }
}
