<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view ('login');
    }

    public function register()
    {
        return view ('register');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        // Hapus session agar tidak tersisa data user yang tersimpan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login')->with('status', 'Anda telah logout.');
    }


    public function authenticating (Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active'){
                session::flash('status', 'failed');
                session::flash('message', 'akun belum aktif, hubungi admin!');
                return redirect('/login');
            }


            // $request->session()->regenerate();
            if(Auth::user()->status == 'active'){
                return redirect('dashboard');
            }


            


        }
        session::flash('status', 'failed');
        session::flash('message', 'Login Invalid');
        return redirect('/login');


    }
}


