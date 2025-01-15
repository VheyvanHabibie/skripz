<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Ruang;
use App\Models\Kontak;
use App\Models\Kaprodi;
use App\Models\Pelamar;
use App\Models\Mahasiswa;
use App\Models\Penjadwalan;
use App\Models\Sekretariat;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\DosenPembimbing;
use App\Models\KelompokKeilmuan;
use App\Models\PredikatKelulusan;
use App\Models\ManajemenLangganan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function superadmin()
    {
        $dosen              = Dosen::all();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::all();
        $mahasiswa          = Mahasiswa::all();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar            = Pelamar::all();
        $langganan          = ManajemenLangganan::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar', 'langganan'));
    }

    public function kaprodi()
    {
        $dosen              = Dosen::where('univ_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::where('univ_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $mahasiswa          = Mahasiswa::where('univ_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar             = Pelamar::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard.kaprodi', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar'));
    }

    public function sekretariat()
    {
        $dosen              = Dosen::all();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::all();
        $mahasiswa          = Mahasiswa::all();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar             = Pelamar::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard.sekretariat', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar'));
    }

    public function dosen()
    {
        $dosen              = Dosen::all();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::all();
        $mahasiswa          = Mahasiswa::all();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar             = Pelamar::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard.dosen', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar'));
    }

    public function industri()
    {
        $dosen              = Dosen::all();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::all();
        $mahasiswa          = Mahasiswa::all();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar             = Pelamar::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard.industri', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar'));
    }

    public function mahasiswa()
    {
        $dosen              = Dosen::all();
        $mitra              = Mitra::all();
        $sekretariat        = Sekretariat::all();
        $mahasiswa          = Mahasiswa::all();
        $kaprodi            = Kaprodi::all();
        $dospem             = DosenPembimbing::all();
        $kelilmuan          = KelompokKeilmuan::all();
        $predlulus          = PredikatKelulusan::all();
        $predlulusS1        = PredikatKelulusan::where('mahasiswa', 'S1')->get();
        $predlulusD3        = PredikatKelulusan::where('mahasiswa', 'D3')->get();
        $penjadwalan        = Penjadwalan::all();
        $ruang              = Ruang::all();
        $akun               = User::all();
        $kontak             = Kontak::all();
        $pelamar             = Pelamar::all();
        $thakademik         = TahunAkademik::query()->select('tahun_akademik', 'semester')->get();
        $jumlahMahasiswaS1  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'S1')
        ->count();
        $jumlahMahasiswaD3  = Mahasiswa::join('mahasiswa_bimbingans', 'mahasiswas.id', '=', 'mahasiswa_bimbingans.mahasiswa_id')
        ->where('jenjang_pendidikan', 'D3')
        ->count();
        $s1 = $predlulusS1->first();
        $d3 = $predlulusD3->first();
        $today = Carbon::today();
        // Mendapatkan tanggal besok
        $tomorrow = Carbon::tomorrow();
        // Mendapatkan tanggal awal minggu ini
        $thisWeekStart = Carbon::now()->startOfWeek();
        // Mendapatkan tanggal akhir minggu ini
        $thisWeekEnd = Carbon::now()->endOfWeek();
        // Mengambil data penjadwalan untuk hari ini
        $penjadwalanHariIni = Penjadwalan::whereDate('tanggal_mulai', $today)->get();
        // Mengambil data penjadwalan untuk besok
        $penjadwalanBesok = Penjadwalan::whereDate('tanggal_mulai', $tomorrow)->get();
        // Mengambil data penjadwalan untuk minggu ini
        $penjadwalanMingguIni = Penjadwalan::whereBetween('tanggal_mulai', [$thisWeekStart, $thisWeekEnd])->get();

        $tasks = Task::all();
        return view('dashboard.mahasiswa', compact('penjadwalan','ruang', 'dospem','kelilmuan', 'kaprodi', 'dosen', 'mitra', 'sekretariat', 'mahasiswa',
        'predlulus', 'thakademik','jumlahMahasiswaS1','jumlahMahasiswaD3', 's1', 'd3', 'penjadwalanHariIni' , 'penjadwalanBesok', 'penjadwalanMingguIni', 'tasks', 'akun', 'kontak', 'pelamar'));
    }
}
