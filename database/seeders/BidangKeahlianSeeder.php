<?php

namespace Database\Seeders;

use App\Models\BidangKeahlian;
use Illuminate\Database\Seeder;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKeahlian::create(['nama_keahlian' => 'Ilmu Komputer']);
        BidangKeahlian::create(['nama_keahlian' => 'Ekonomi']);
        BidangKeahlian::create(['nama_keahlian' => 'Sastra']);
        BidangKeahlian::create(['nama_keahlian' => 'Biologi']);
    }
}
