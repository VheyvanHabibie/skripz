<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
