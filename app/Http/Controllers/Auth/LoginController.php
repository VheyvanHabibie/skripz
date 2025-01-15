<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect berdasarkan role.
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        // Tentukan redirect berdasarkan role pengguna
        switch ($user->role->name) {
            case 'Ketua Program Studi':
                return route('kaprodi.dashboard');
            case 'Sekretariat':
                return route('sekretariat.dashboard');
            case 'Dosen':
                return route('dosen.dashboard');
            case 'Mahasiswa':
                return route('mahasiswa.dashboard');
            case 'Industri':
                return route('industri.dashboard');
            case 'SuperAdmin':
                return route('superadmin.dashboard');
            default:
                return '/dashboard'; // Default redirect jika role tidak dikenali
        }
    }

    /**
     * Override fungsi login untuk penyesuaian validasi dan redirect.
     */
    public function login(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'captcha' => 'required|captcha', // Validasi CAPTCHA
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'captcha.required' => 'CAPTCHA wajib diisi.',
            'captcha.captcha' => 'Verifikasi CAPTCHA gagal, silakan coba lagi.',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('email', 'password');

        // Coba login dengan kredensial
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Redirect ke URL yang sesuai role
            return redirect()->intended($this->redirectTo());
        }

        // Jika login gagal
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok dengan catatan kami.'],
        ]);
    }

    /**
     * Fungsi logout pengguna.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
