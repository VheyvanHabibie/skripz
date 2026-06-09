<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'Super Admin SkripZ',
            'email'     => 'admin@skripz.co.id',
            'role_id'   => 1,
            'password'  => Hash::make('12345678'),
            'foto'      => 'assets/images/Profiledefault.png',
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name'      => 'Dosen SkripZ',
            'email'     => 'dosen@skripz.co.id',
            'role_id'   => 1,
            'password'  => Hash::make('12345678'),
            'foto'      => 'assets/images/Profiledefault.png',
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name'      => 'Mahasiswa SkripZ',
            'email'     => 'mahasiswa@skripz.co.id',
            'role_id'   => 1,
            'password'  => Hash::make('12345678'),
            'foto'      => 'assets/images/Profiledefault.png',
        ]);
        $user->assignRole(1);
    }
}
