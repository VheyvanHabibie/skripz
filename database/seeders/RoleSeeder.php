<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Ketua Program Studi']);
        Role::create(['name' => 'Dosen']);
        Role::create(['name' => 'Mahasiswa']);
        Role::create(['name' => 'Sekretariat']);
        Role::create(['name' => 'Industri']);
    }
}
