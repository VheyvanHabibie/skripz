<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Sidang;
use App\Models\Tulisan;
use App\Models\Asistensi;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use App\Models\Perbaikan;
use App\Models\Presentasi;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Models\SidangPenguji;
use App\Models\KartuBimbingan;
use App\Models\KualitasProduk;
use App\Models\PenguasaanMateri;
use App\Http\Controllers\Controller;

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
        $dosen = Dosen::all();

        $penilaian = Penilaian::orderBy('grup', 'DESC')->get();
        return view('pages.penilaian.sidang', compact('mahasiswa', 'tulisan', 'presentasi', 'penguasaan', 'kualitas', 'penilaian', 'dosen'));
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

    public function penilaianSidang(Request $request)
    {
        // Validasi input
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|array',
            'dosen_id.*' => 'exists:dosens,id',
            'penilaian_id' => 'required|array',
            'penilaian_id.*.id' => 'exists:penilaians,id',
            'nilai' => 'required|array',
            'nilai.*.nilai' => 'integer|min:0|max:5'
        ]);

        // Simpan nilai penilaian sidang
        foreach ($request->penilaian_id as $id => $penilaian) {
            Sidang::updateOrCreate(
                [
                    'mahasiswa_id' => $request->mahasiswa_id,
                    'penilaian_id' => $penilaian['id']
                ],
                ['nilai' => $request->nilai[$id]['nilai']]
            );
        }

        // Simpan dosen penguji (hapus dulu yang lama, lalu tambahkan baru)
        SidangPenguji::whereHas('sidang', function ($query) use ($request) {
            $query->where('mahasiswa_id', $request->mahasiswa_id);
        })->delete();

        foreach ($request->dosen_id as $dosen_id) {
            SidangPenguji::create([
                'sidang_id' => Sidang::where('mahasiswa_id', $request->mahasiswa_id)->first()->id,
                'dosen_id' => $dosen_id
            ]);
        }

        return redirect()->back()->with('success', 'store');
    }

    public function daftarPenilaian()
    {
        $sidangs = Sidang::select(
            'mahasiswa_id',
            \DB::raw('SUM(nilai) as total_nilai'),
            \DB::raw('AVG(nilai) as rata_nilai') // Hitung rata-rata
        )
        ->groupBy('mahasiswa_id')
        ->with('mahasiswa')
        ->get();

        return view('pages.penilaian.sidang.index', compact('sidangs'));
    }



    public function hasilPenilaian($id)
    {
        $sidang = Sidang::with(['mahasiswa', 'pengujis.dosen'])
                        ->where('mahasiswa_id', $id)
                        ->get();

        // Hitung total nilai dari semua sidang yang dimiliki mahasiswa
        $totalNilai = $sidang->sum('nilai');

        // Hitung rata-rata nilai
        $rataNilai = $sidang->count() > 0 ? $totalNilai / $sidang->count() : 0;

        return view('pages.penilaian.sidang.hasil', compact('sidang', 'totalNilai', 'rataNilai'));
    }


}
