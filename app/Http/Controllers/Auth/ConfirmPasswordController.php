<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Override the redirectTo method.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login

        switch ($user->role->name) {
            case 'Ketua Program Studi': // Ketua Program Studi
                return route('kaprodi.dashboard');
            case 'Sekretariat': // Sekretariat
                return route('sekretariat.dashboard');
            case 'Dosen': // Dosen
                return route('dosen.dashboard');
            case 'Mahasiswa': // Mahasiswa
                return route('mahasiswa.dashboard');
            case 'Industri': // Industri
                return route('industri.dashboard');
            case 'SuperAdmin': // SuperAdmin
                return route('superadmin.dashboard');
            default:
                return route('dashboard'); // Default jika role tidak dikenali
        }
    }
}
