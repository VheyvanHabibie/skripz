<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Jabatan;
use App\Models\Jurusan;
use App\Models\Keilmuan;
use App\Models\Mahasiswa;
use App\Models\Sekretariat;
use Illuminate\Support\Str;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use App\Models\BidangKeahlian;
use App\Imports\MahasiswaImport;
use App\Imports\SekretariatImport;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        $roles = Role::all();

        return view('pages.managemen.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::query()
        ->create($request->except('_token', 'password', 'password_confirmation') + [
            'password' => Hash::make($request->password), 'foto' => 'assets/images/Profiledefault.png',
        ]);

        $user->assignRole($request->role_id);

        return back()->with('success', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required',
        ];

        // Validasi email hanya jika email baru berbeda dengan email saat ini
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users,email';
        }

        // Validasi password jika password baru tidak kosong
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $request->validate($rules);

        // Update data pengguna
        $userData = $request->only('name', 'username', 'email');

        // Update password jika password baru tidak kosong
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        // Mengganti peran pengguna
        $user->syncRoles($request->role_id);

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('management-user.index')->with('success', "destroy");
    }

    public function profile() {
        $jabatan        = Jabatan::all();
        $jurusan        = Jurusan::all();
        $bidkeahlian    = BidangKeahlian::all();
        $keilmuan       = Keilmuan::all();
        return view('profile', compact('jabatan', 'bidkeahlian', 'keilmuan', 'jurusan'));
    }

    public function updateProfile(Request $request, $id) {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto sebelumnya jika ada
            if ($user->foto && file_exists(public_path($user->foto))) {
                unlink(public_path($user->foto));
            }

            $file = $request->file('foto');
            $imageName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/user'), $imageName);

            // Perbarui kolom foto di database
            $user->foto = 'images/user/' . $imageName;
        }

        $user->update([
            'name'                => $request->name,
            'email'               => $request->email,
        ]);

        return back()->with('success', 'update');
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'name'                => ['required', 'string', 'max:255'],
            'email'               => ['required', 'string', 'email', 'max:255', 'unique:mahasiswas,email,' . $id],
            'tempat_lahir'        => ['required', 'string', 'max:255'],
            'tanggal_lahir'       => ['required', 'date'],
            'tanggal_masuk'       => ['required', 'date'],
            'jenis_kelamin'       => ['required', 'string', 'in:Laki-Laki,Perempuan'],
            'alamat'              => ['required', 'string', 'max:255'],
            'nim'                 => ['required', 'string', 'max:255'],
            'jurusan_id'             => ['required', 'string', 'max:255'],
            'jenjang_pendidikan'  => ['required', 'string', 'max:255'],
            'no_telepon'          => ['required', 'string', 'max:255'],
        ]);
        $mahasiswa = Mahasiswa::findOrFail($id);
        if ($request->hasFile('foto')) {
            // Hapus foto sebelumnya jika ada
            if ($mahasiswa->foto && file_exists(public_path($mahasiswa->foto))) {
                unlink(public_path($mahasiswa->foto));
            }

            $file = $request->file('foto');
            $imageName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/mahasiswa'), $imageName);
        }
        $mahasiswa->update([
            'foto'                => isset($imageName) ? 'images/mahasiswa/' . $imageName : $mahasiswa->foto,
            'name'                => $request->name,
            'email'               => $request->email,
            'tempat_lahir'        => $request->tempat_lahir,
            'tanggal_lahir'       => $request->tanggal_lahir,
            'tanggal_masuk'       => $request->tanggal_masuk,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'alamat'              => $request->alamat,
            'nim'                 => $request->nim,
            'jurusan_id'             => $request->jurusan_id,
            'jenjang_pendidikan'  => $request->jenjang_pendidikan,
            'no_telepon'          => $request->no_telepon,
        ]);
        $user = User::findOrFail($mahasiswa->user_id);
        $user->update([
            'foto'                => isset($imageName) ? 'images/mahasiswa/' . $imageName : $mahasiswa->foto,
            'name'                => $request->name,
            'email'               => $request->email,
        ]);
        return redirect()->back()->with('success', 'update');
    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'jabatan_id'        => 'required',
            'keilmuan_id'       => 'required',
            'nip_dosen'         => 'required|string|max:255',
            'nama_dosen'        => 'required|string|max:255',
            'tempat_lahir'      => 'required|string|max:255',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required|string|max:255',
            'email'             => 'required|string|max:255',
            'no_telepon'        => 'required|string|max:255',
            'bidang_keahlian'   => 'required',
            'status_dosen'      => 'required|string|max:255',
        ]);

        $dosen = Dosen::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto sebelumnya jika ada
            if ($dosen->foto && file_exists(public_path($dosen->foto))) {
                unlink(public_path($dosen->foto));
            }

            $file = $request->file('foto');
            $imageName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/dosen'), $imageName);
        }
        if ($request->paraf) {
            // Hapus tanda tangan sebelumnya jika ada
            if ($dosen->paraf && file_exists(public_path($dosen->paraf))) {
                unlink(public_path($dosen->paraf));
            }

            if ($request->hasFile('paraf')) {
                $signatureName = time() . '_' . $request->file('paraf')->getClientOriginalName();
                $request->file('paraf')->move(public_path('images/dosen/signatures/'), $signatureName);
            } else {
                $folderPath     = public_path('images/dosen/signatures/');
                $image_parts    = explode(";base64,", $request->paraf);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type     = $image_type_aux[1];
                $image_base64   = base64_decode($image_parts[1]);
                $signatureName  = time() . '_' . uniqid() . '.' . $image_type;
                $file           = $folderPath . $signatureName;
                file_put_contents($file, $image_base64);
            }
        }


        $dosen->update([
            'jabatan_id'        => $request->jabatan_id,
            'keilmuan_id'       => $request->keilmuan_id,
            'nip_dosen'         => $request->nip_dosen,
            'nama_dosen'        => $request->nama_dosen,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat'            => $request->alamat,
            'email'             => $request->email,
            'no_telepon'        => $request->no_telepon,
            'bidang_keahlian'   => json_encode($request->bidang_keahlian),
            'foto'              => isset($imageName) ? 'images/dosen/' . $imageName : $dosen->foto,
            'paraf'             => isset($signatureName) ? 'images/dosen/signatures/'.$signatureName : $dosen->paraf,
            'status_dosen'      => $request->status_dosen,
            'akun_link'         => $request->akun_link,
        ]);

        $user = User::findOrFail($dosen->user_id);
        $user->update([
            'name'         => $request->nama_dosen,
            'email'        => $request->email,
            'foto'         => isset($imageName) ? 'images/dosen/' . $imageName : $dosen->foto,
        ]);

        return redirect()->back()->with('success', 'update');
    }

    public function updateSekretariat(Request $request, $id)
    {
        $request->validate([
            'nama_sekretariat'    => 'required|string|max:255',
            'nip'                 => 'required|string|max:255',
            'jabatan_id'          => 'required|string|max:255',
            'email'               => 'required|string|max:255',
            'no_telepon'          => 'required|string|max:255',
        ]);

        $sekretariat = Sekretariat::findOrFail($id);
        if ($request->hasFile('foto')) {
            // Hapus foto sebelumnya jika ada
            if ($sekretariat->foto && file_exists(public_path($sekretariat->foto))) {
                unlink(public_path($sekretariat->foto));
            }

            $file = $request->file('foto');
            $imageName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/sekretariat'), $imageName);
        }
        $sekretariat->update([
            'nama_sekretariat'    => $request->nama_sekretariat,
            'nip'                 => $request->nip,
            'jabatan_id'          => $request->jabatan_id,
            'email'               => $request->email,
            'no_telepon'          => $request->no_telepon,
            'foto'                => isset($imageName) ? 'images/sekretariat/' . $imageName : $sekretariat->foto,
        ]);
        $user = User::findOrFail($sekretariat->user_id);
        $user->update([
            'name'         => $request->nama_sekretariat,
            'email'        => $request->email,
            'foto'         => isset($imageName) ? 'images/sekretariat/' . $imageName : $sekretariat->foto,
        ]);
        return back()->with('success', 'update');

    }

    public function updateMitra(Request $request, $id)
    {
        $request->validate([
            'nama_mitra'        => 'required|string|max:255',
            'bidang_usaha'      => 'required|string|max:255',
            'alamat_mitra'      => 'required|string|max:255',
            'email_mitra'       => 'required|string|max:255',
            'no_telepon_mitra'  => 'required|string|max:255',
            'website'           => 'required|string|max:255',
            'penanggung_jawab'  => 'required|string|max:255',
            'jabatan_pj'        => 'required|string|max:255',
            'email_pj'          => 'required|string|max:255',
            'no_telepon_pj'     => 'required|string|max:255',
            'deskripsi'         => 'required|string|max:255',
            // 'logo'              => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $mitra = Mitra::findOrFail($id);
        if ($request->hasFile('logo')) {
            // Hapus logo sebelumnya jika ada
            if ($mitra->logo && file_exists(public_path($mitra->logo))) {
                unlink(public_path($mitra->logo));
            }

            $file = $request->file('logo');
            $imageName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/mitra'), $imageName);
        }

        $mitra->update([
            'nama_mitra'        => $request->nama_mitra,
            'bidang_usaha'      => $request->bidang_usaha,
            'alamat_mitra'      => $request->alamat_mitra,
            'email_mitra'       => $request->email_mitra,
            'no_telepon_mitra'  => $request->no_telepon_mitra,
            'website'           => $request->website,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'jabatan_pj'        => $request->jabatan_pj,
            'email_pj'          => $request->email_pj,
            'no_telepon_pj'     => $request->no_telepon_pj,
            'deskripsi'         => $request->deskripsi,
            'logo'              => isset($imageName) ? 'images/mitra/' . $imageName : $mitra->logo,
        ]);
        $user = User::findOrFail($mitra->user_id);
        $user->update([
            'name'         => $request->nama_mitra,
            'email'        => $request->email_mitra,
            'foto'         => isset($imageName) ? 'images/mitra/' . $imageName : $mitra->logo,
        ]);

        return redirect()->back()->with('success', 'update');

    }

    public function indexPassword()
    {
        return view('auth.ganti-password.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'update');
    }
    public function importMahasiswa(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new MahasiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'store');
    }
    public function importDosen(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new DosenImport, $request->file('file'));

        return redirect()->back()->with('success', 'store');
    }
    public function importSekretariat(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new SekretariatImport, $request->file('file'));

        return redirect()->back()->with('success', 'store');
    }

}
