<?php

namespace App\Http\Controllers;

use App\Models\Tulisan;
use App\Models\Asistensi;
use App\Models\Mahasiswa;
use App\Models\Perbaikan;
use App\Models\Presentasi;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Models\KartuBimbingan;
use App\Models\KualitasProduk;
use App\Models\PenguasaanMateri;

class PenilaianController extends Controller
{
    public function penilaian()
    {
        return view('pages.penilaian.index');
    }

    public function sidang() {
        $tulisan = Tulisan::all();
        $presentasi = Presentasi::all();
        $penguasaan = PenguasaanMateri::all();
        $kualitas = KualitasProduk::all();
        $mahasiswa = Mahasiswa::all();


        return view('pages.penilaian.sidang', compact('mahasiswa', 'tulisan', 'presentasi', 'penguasaan', 'kualitas'));
    }
    public function seminar() {
        $tulisan = Tulisan::all();
        $presentasi = Presentasi::all();
        $penguasaan = PenguasaanMateri::all();
        $kualitas = KualitasProduk::all();
        $perbaikan = Perbaikan::all();
        $asistensi = Asistensi::all();
        $persyaratan = Persyaratan::all();
        $kartu = KartuBimbingan::first();
        $mahasiswa = Mahasiswa::all();

        return view('pages.penilaian.seminar', compact('mahasiswa', 'perbaikan','persyaratan','tulisan','presentasi','penguasaan','kualitas','asistensi','kartu'));
    }
}
