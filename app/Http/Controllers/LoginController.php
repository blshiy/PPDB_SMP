<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;


class LoginController extends Controller
{
    public function halamanLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman yang diinginkan
            return redirect()->route('dashboard')->withSuccess('Berhasil Login');
        } elseif (Auth::guard('siswa')->attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman yang diinginkan
            return redirect()->route('siswa')->withSuccess('Berhasil Login');
        } else {
            // Jika autentikasi gagal, redirect kembali ke halaman login dengan pesan error
            return redirect()->route('login')->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
    }

    public function halamanDaftar()
    {
        return view('auth.daftar');
    }

    public function processDaftar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:siswa',
            'password' => 'required|min:6|confirmed',
        ]);

        $siswa = Siswa::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Jika registrasi berhasil, lakukan proses login
        Auth::guard('siswa')->login($siswa);

        // Redirect ke halaman siswa setelah login
        return redirect()->route('siswa')->with('success', 'Selamat datang! Akun Anda telah berhasil dibuat.');
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }
        return redirect()->route('login')->with('success', 'berhasil logout');
    }
}
