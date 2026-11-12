<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // LOGIN KARYAWAN
    public function proseslogin(Request $request)
    {
        if (Auth::guard('karyawan')->attempt([
            'nik' => $request->nik,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return redirect('/')
            ->with(['warning' => 'NIK atau Password salah']);
    }

    // LOGOUT KARYAWAN
    public function proseslogout(Request $request)
    {
        Auth::guard('karyawan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // LOGOUT ADMIN
    public function proseslogoutadmin(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/panel');
    }

    // LOGIN ADMIN
    public function prosesloginadmin(Request $request)
    {
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/panel/dashboardadmin');
        }

        return redirect('/panel')
            ->with(['warning' => 'Username atau Password salah']);
    }
}
