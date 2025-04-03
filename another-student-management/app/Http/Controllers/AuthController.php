<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view("auth.login");
    }

    public function login(Request $request){
        $validated = $request ->validate([
            "username"=> "required|string",
            "password"=> "required|string"
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            //Get the authenticated user
            $user = Auth::user();

            //store is_teacher in the session
            $request->session()->put('is_teacher', $user->is_teacher);
            $request->session()->put('uuid', $user->uuid);
            
            return redirect()->route("dashboard.index");
        }
        throw ValidationException::withMessages([
            "credentials"=> "Incorrect credential"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }
}
