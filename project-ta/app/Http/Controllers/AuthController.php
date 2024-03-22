<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use illuminate\Support\Facades\Validator;
// use illuminate\Support\Facades\Hash;
use illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave( Request $request)
    {

        User::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => $request->password,
            'password' => bcrypt($request->password),
        ]);
  
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        if (Auth::attempt($request->only('nis', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login')->with('error', 'Username atau password yang anda masukkan salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/login');
    }
 
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request) {

        $user = Auth::user();

        if ($request->has('name', 'email', 'password')) {           
            $user->name = ($request->input('name'));
            $user->email = ($request->input('email'));
            $user->password = bcrypt($request->input('password'));
        } else {

        }
        $user->save();
    
        return redirect('/dashboard')->with('success', 'Password berhasil diubah.');
    }
}
