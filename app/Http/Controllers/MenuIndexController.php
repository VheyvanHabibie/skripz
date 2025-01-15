<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tulisan;
use App\Models\Asistensi;
use App\Models\Perbaikan;
use App\Models\Presentasi;
use App\Models\Persyaratan;
use App\Models\KartuBimbingan;
use App\Models\KualitasProduk;
use App\Models\PenguasaanMateri;

class MenuIndexController extends Controller
{
    public function datamaster()
    {
        return view('pages.datamaster.index');
    }
    public function datautama()
    {
        return view('pages.datamaster.utama');
    }
    public function managemen() {
        return view('pages.managemen.index');
    }
    public function berkas()
    {
        $tulisan = Tulisan::all();
        $presentasi = Presentasi::all();
        $penguasaan = PenguasaanMateri::all();
        $kualitas = KualitasProduk::all();
        $perbaikan = Perbaikan::all();
        $asistensi = Asistensi::all();
        $persyaratan = Persyaratan::all();
        $kartu = KartuBimbingan::first();

        return view('pages.berkas.index', compact('perbaikan','persyaratan','tulisan','presentasi','penguasaan','kualitas','asistensi','kartu'));
    }
    public function laporan()
    {
        return view('pages.laporan.index');
    }
    public function owner()
    {
        return view('owner');
    }
    public function indexberkas()
    {
        return view('pages.berkas.berkas');
    }
}
