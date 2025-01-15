<?php

namespace Database\Seeders;

use App\Models\Keilmuan;
use Illuminate\Database\Seeder;

class KeilmuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keilmuan::create(['nama_keilmuan' => 'Soft Computing']);
        Keilmuan::create(['nama_keilmuan' => 'Instrumentasi']);
    }
}
