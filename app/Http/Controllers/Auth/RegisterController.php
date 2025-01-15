<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@(example\.com|anotherdomain\.com|[a-zA-Z0-9.-]+\.co\.id)$/',
            ],
            'password'            => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'             => ['required'],
            'pts_id'              => ['nullable'],
            'captcha1'            => ['nullable', function ($attribute, $value, $fail) {
                // Validasi CAPTCHA 1 jika diisi
                if ($value && !Captcha::check($value)) {
                    $fail('Verifikasi CAPTCHA gagal, silakan coba lagi.');
                }
            }],
            'captcha2'            => ['nullable', function ($attribute, $value, $fail) {
                // Validasi CAPTCHA 2 jika diisi
                if ($value && !Captcha::check($value)) {
                    $fail('Verifikasi CAPTCHA gagal, silakan coba lagi.');
                }
            }],
        ])->after(function ($validator) use ($data) {
            // Jika kedua CAPTCHA tidak diisi, tampilkan error
            if (empty($data['captcha1']) && empty($data['captcha2'])) {
                $validator->errors()->add('captcha', 'Harap isi salah satu CAPTCHA.');
            }
        });
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'role_id'             => $data['role_id'],
            'pts_id'              => $data['pts_id'],
            'foto'                => 'assets/images/Profiledefault.png',
            'name'                => $data['name'],
            'email'               => $data['email'],
            'password'            => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role_id']);

        // Cek role_id untuk memasukkan data ke tabel terkait
        if ($data['role_id'] == 2) {
            Kaprodi::create([
                'user_id'        => $user->id,
                'name'           => $data['name'],
                'email'          => $data['email'],
                'foto'           => 'assets/images/Profiledefault.png',
            ]);
        } else {
            Mitra::create([
                'user_id'             => $user->id,
                'penanggung_jawab'    => $data['name'],
                'email_pj'            => $data['email'],
                'logo'                => 'assets/images/Profiledefault.png',
            ]);
        }

        return $user;
    }

    protected function registered()
    {
        switch (Auth::user()->role_id) {
            case 2: // Ketua Program Studi
                return redirect()->route('kaprodi.dashboard');
            case 5: // Sekretariat
                return redirect()->route('sekretariat.dashboard');
            case 3: // Dosen
                return redirect()->route('dosen.dashboard');
            case 4: // Mahasiswa
                return redirect()->route('mahasiswa.dashboard');
            case 6: // Industri
                return redirect()->route('industri.dashboard');
            case 1: // SuperAdmin
                return redirect()->route('superadmin.dashboard');
            default:
                return redirect('/dashboard'); // Default redirect
        }
    }
}
