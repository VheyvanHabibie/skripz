<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DosenPembimbing;
use App\Models\LaporanBimbingan;
use App\Http\Controllers\Controller;

class LaporanBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dospem = DosenPembimbing::all();
        $mahasiswas = Mahasiswa::all();
        $bimbingan = LaporanBimbingan::orderBy('created_at', 'DESC')->get();
        return view('pages.laporan.lapor-bimbingan.index', compact('bimbingan', 'dospem', 'mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dosen_pembimbing_id'   => 'required',
            'mahasiswa_id'          => 'required',
            'tanggal_bimbingan'      => 'required',
            'topik_bahasan'          => 'required',
            'hasil_bimbingan'        => 'required|string|max:255',
            'saran_pembimbing'       => 'required|string',
            'catatan_mahasiswa'      => 'required|string',
            'file_laporan'           => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        $bimbingan =  new LaporanBimbingan;
        $fileName = time() . '_' . $request->file('file_laporan')->getClientOriginalName();
        $request->file('file_laporan')->move(public_path('files/laporan-bimbingan'), $fileName);

        $bimbingan->dosen_pembimbing_id = $request->dosen_pembimbing_id;
        $bimbingan->mahasiswa_id        = $request->mahasiswa_id;
        $bimbingan->tanggal_bimbingan   = $request->tanggal_bimbingan;
        $bimbingan->topik_bahasan       = $request->topik_bahasan;
        $bimbingan->hasil_bimbingan     = $request->hasil_bimbingan;
        $bimbingan->saran_pembimbing    = $request->saran_pembimbing;
        $bimbingan->saran_pembimbing    = $request->saran_pembimbing;
        $bimbingan->catatan_mahasiswa   = $request->catatan_mahasiswa;
        $bimbingan->file_laporan        = 'files/laporan-bimbingan/' . $fileName;
        $bimbingan->save();

        return back()->with('success', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dosen_pembimbing_id'   => 'required',
            'mahasiswa_id'          => 'required',
            'tanggal_bimbingan'      => 'required',
            'topik_bahasan'          => 'required',
            'hasil_bimbingan'        => 'required|string|max:255',
            'saran_pembimbing'       => 'required|string',
            'catatan_mahasiswa'      => 'required|string',
        ]);

        $bimbingan = LaporanBimbingan::findOrFail($id);
        if ($request->hasFile('file_laporan')) {
            // Hapus file_laporan sebelumnya jika ada
            if ($bimbingan->file_laporan && file_exists(public_path($bimbingan->file_laporan))) {
                unlink(public_path($bimbingan->file_laporan));
            }

            $file = $request->file('file_laporan');
            $fileName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files/laporan-kemajuan-bimbingan'), $fileName);
        }
        $bimbingan->update([
            'dosen_pembimbing_id'   => $request->dosen_pembimbing_id,
            'mahasiswa_id'          => $request->mahasiswa_id,
            'tanggal_bimbingan'      =>  $request->tanggal_bimbingan,
            'topik_bahasan'          =>  $request->topik_bahasan,
            'hasil_bimbingan'        =>  $request->hasil_bimbingan,
            'saran_pembimbing'       =>  $request->saran_pembimbing,
            'catatan_mahasiswa'      =>  $request->catatan_mahasiswa,
            'file_laporan'           =>  isset($fileName) ? 'files/laporan-bimbingan/' . $fileName : $bimbingan->file_laporan,
        ]);

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bimbingan = LaporanBimbingan::findOrFail($id);

        if (LaporanBimbingan::destroy($id)) {
            // Menghapus file terkait jika ada
            if (!empty($bimbingan->file_laporan)) {
                if (file_exists(public_path($bimbingan->file_laporan))) {
                    unlink(public_path($bimbingan->file_laporan));
            }
        }
            return redirect()->route('laporan-bimbingan.index')->with('success', 'destroy');
        } else {
            return redirect()->route('laporan-bimbingan.index')->with('fail', 'destroy');
        }
    }
}
