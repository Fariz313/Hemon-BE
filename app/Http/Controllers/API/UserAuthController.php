<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        if (request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'email' => $user->email,
            'name' => $user->name,
            'role' => $user->role,
        ]);

        return response([ 'user' => $user]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // return redirect()->intended('dashboard');
            if (request()->segment(1) == 'api') return response()->json([
                'error' => false,
                'email' => $user->email,
                'name' => $user->name,
                'role' => $user->role,
            ]);

            return redirect()->intended('dashboard');
        }

        if (request()->segment(1) == 'api') return response()->json([
            'error' => true,
        ]);
 
        return back()->withErrors([
            'email' => 'Maaf Email atau Password Anda Salah!',
        ])->onlyInput('email');

    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
