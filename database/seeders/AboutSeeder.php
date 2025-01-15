<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!About::first()) {
            About::create([
                'judul' => 'Judul',
                'deskripsi' => 'Lorem ipsum dolor sit amet, te dolores sapientem eos, nonumy civibus volutpat an vis. Vis vide definitiones mediocritatem te. Ad erant aperiri sit, eu eum alii tempor, stet evertitur assentior ei est. Omnis fuisset antiopam eu eum. Ex tale mutat duo, nostro propriae ei cum, modo fabellas nominati in eos. Bonorum deleniti percipitur sit ad, in pri prima meliore euripidis. Ne ancillae apeirian eam. Tollit virtute conceptam in eos. Qui quaeque delectus maluisset no, id nulla partem erroribus sed. Sea ut stet maluisset, an denique adolescens eam, vim ancillae mediocrem ad. Te quot virtute sea, vero blandit usu no. Dico utinam vituperata nam ad, ne est autem similique dissentias. Eum ne natum tempor cetero. Sit vero vocent interesset ea.',

            ]);
        }
    }
}
