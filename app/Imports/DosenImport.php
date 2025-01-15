<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
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
            'nip'           => 'nullable|max:20|unique:dosens,nip_dosen',
            'jenis_kelamin' => 'required|in:' . implode(',', $allowedGenders),
        ]);

        if ($validator->fails()) {
            return null;
        }

        $user = User::create([
            'name'     => $row['nama_lengkap'],
            'email'    => $row['email'],
            'password' => bcrypt('password1234'),
            'role_id'  => 3,
            'foto'     => 'assets/images/Profiledefault.png',
        ]);

        $user->assignRole(3);

        Dosen::create([
            'user_id'               => $user->id,
            'univ_id'               => Auth::user()->id,
            'nama_dosen'            => $user->name,
            'email'                 => $user->email,
            'nip_dosen'             => $row['nip'],
            'no_telepon'            => $row['telepon'],
            'slug'                  => Str::slug($user->name, '-'),
            'jenis_kelamin'         => ucwords($row['jenis_kelamin']),
            'foto'                  => 'assets/images/Profiledefault.png',
        ]);

        return null;
    }
}
