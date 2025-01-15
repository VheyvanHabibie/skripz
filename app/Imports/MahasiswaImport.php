<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * Fungsi untuk memetakan setiap row menjadi model User.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $row['jenis_kelamin'] = strtolower($row['jenis_kelamin']);
        $allowedGenders = ['laki-laki', 'perempuan'];

        $validator = Validator::make($row, [
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'telepon'       => 'nullable|max:15',
            'nim'           => 'nullable|max:20|unique:mahasiswas,nim',
            'jenis_kelamin' => 'required|in:' . implode(',', $allowedGenders),
        ]);

        if ($validator->fails()) {
            return null;
        }

        $user = User::create([
            'name'     => $row['nama_lengkap'],
            'email'    => $row['email'],
            'password' => bcrypt('password1234'),
            'role_id'  => 4,
            'foto'     => 'assets/images/Profiledefault.png',
        ]);

        $user->assignRole(4);

        Mahasiswa::create([
            'user_id'       => $user->id,
            'univ_id'       => Auth::user()->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'nim'           => $row['nim'],
            'no_telepon'    => $row['telepon'],
            'jenis_kelamin' => ucwords($row['jenis_kelamin']),
            'slug'          => Str::slug($user->name, '-'),
            'foto'          => 'assets/images/Profiledefault.png',
        ]);

        return null;
    }
}
