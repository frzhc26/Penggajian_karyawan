<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Memproses login
     */
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek email dan password
        if (Auth::attempt($credentials)) {

            // Membuat session baru demi keamanan
            $request->session()->regenerate();

            // Jika berhasil login
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau Password salah!',
        ])->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus session
        $request->session()->invalidate();

        // Membuat token session baru
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}