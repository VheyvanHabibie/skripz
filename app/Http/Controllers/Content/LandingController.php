<?php

namespace App\Http\Controllers\Content;

use App\Models\Klien;
use App\Models\Paket;
use App\Models\Unduh;
use App\Models\Kontak;
use App\Models\Beranda;
use App\Models\Layanan;
use App\Models\Tentang;
use App\Models\Ekosistem;
use App\Models\ListLayanan;
use Illuminate\Http\Request;
use App\Models\ListEkosistem;
use App\Models\MitraPengguna;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        $tentang = Tentang::first();
        $unduh   = Unduh::first();
        $layanan = Layanan::first();
        $ekosistem = Ekosistem::first();
        $listlayanan = ListLayanan::all();
        $listekosistem = ListEkosistem::orderBy('created_at', 'DESC')->get();
        $mitra   = MitraPengguna::orderBy('created_at', 'DESC')->get();
        $klien   = Klien::orderBy('created_at', 'DESC')->get();
        $paket_akademisi   = Paket::where('kategori', 'Akademisi')->get();
        $paket_industri    = Paket::where('kategori', 'Industri')->get();
        return view('frontend.main', compact('beranda', 'tentang', 'mitra', 'klien', 'unduh', 'layanan', 'listlayanan','ekosistem', 'listekosistem', 'paket_akademisi', 'paket_industri'));
    }

    public function kontak(Request $request)
    {

        $validated = $request->validate([
            'nama_pengirim'   => 'required|string|max:255',
            'email_pengirim'  => 'required|string|max:255',
            'pesan_pengirim'  => 'required|string',
            'captcha'         => 'required|captcha',
        ], [
            'captcha.captcha'  => 'Verifikasi CAPTCHA gagal, silakan coba lagi.',
        ]);

        $kontak = Kontak::create([
            'nama_pengirim'   => $request->nama_pengirim,
            'email_pengirim'  => $request->email_pengirim,
            'pesan_pengirim'  => $request->pesan_pengirim,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan Berhasil Dikirim',
        ]);
    }
}
