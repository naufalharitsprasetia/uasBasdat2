<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login', [
            'active' => 'login',
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->only('username', 'password');

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                Auth::login($user);
                return redirect('/')->with('success', 'Selamat ! anda berhasil Masuk');
            } else {
                return redirect()->back()->with('loginError', 'Login Failed!');
            }
        } else {
            return redirect()->back()->with('loginError', 'Login Failed!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}