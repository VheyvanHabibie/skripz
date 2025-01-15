<?php

namespace App\Http\Controllers\Export;

use Carbon\Carbon;
use App\Models\Tulisan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Asistensi;
use App\Models\Perbaikan;
use App\Models\Presentasi;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Models\KartuBimbingan;
use App\Models\KualitasProduk;
use App\Models\PenguasaanMateri;
use App\Http\Controllers\Controller;

class BerkasController extends Controller
{
    public function berkasPdf() {
        // Ambil data dari model-model yang diperlukan
        $tulisan = Tulisan::all();
        $presentasi = Presentasi::all();
        $penguasaan = PenguasaanMateri::all();
        $kualitas = KualitasProduk::all();
        $perbaikan = Perbaikan::all();
        $asistensi = Asistensi::all();
        $persyaratan = Persyaratan::all();
        $kartu = KartuBimbingan::first();

        // Buat berkas PDF dengan menggunakan view 'export.berkas' dan kirimkan data
        $pdf = PDF::loadView('export.berkas', [
            'tulisan' => $tulisan,
            'presentasi' => $presentasi,
            'penguasaan' => $penguasaan,
            'kualitas' => $kualitas,
            'perbaikan' => $perbaikan,
            'asistensi' => $asistensi,
            'persyaratan' => $persyaratan,
            'kartu' => $kartu,
        ]);

        // Kembalikan berkas PDF yang di-stream dengan nama yang sesuai
        return $pdf->stream('Berkas_Export' . Carbon::now()->format('Ymd_His') . '.pdf');
    }
}
