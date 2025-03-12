<?php

namespace App\Http\Controllers\Laporan;

use App\Models\DosenPenguji;
use Illuminate\Http\Request;
use App\Models\LaporanSidang;
use App\Http\Controllers\Controller;

class LaporanSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sidang = LaporanSidang::orderBy('created_at', 'DESC')->get();
        $dospeng = DosenPenguji::all();
        return view('pages.laporan.lapor-sidang.index', compact('sidang', 'dospeng'));
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
            'tanggal_sidang'     => 'required',
            'waktu_sidang'       => 'required',
            'judul_skripsi'      => 'required',
            'dosen_penguji1'     => 'required|string|max:255',
            'dosen_penguji2'     => 'required|string|max:255',
            'nilai_skripsi'      => 'required|string',
            'saran_penguji'      => 'required|string',
            'file_laporan'       => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        $seminar =  new LaporanSidang;
        $fileName = time() . '_' . $request->file('file_laporan')->getClientOriginalName();
        $request->file('file_laporan')->move(public_path('files/laporan-sidang'), $fileName);

        $seminar->tanggal_sidang    = $request->tanggal_sidang;
        $seminar->waktu_sidang      = $request->waktu_sidang;
        $seminar->judul_skripsi     = $request->judul_skripsi;
        $seminar->dosen_penguji1    = $request->dosen_penguji1;
        $seminar->dosen_penguji2    = $request->dosen_penguji2;
        $seminar->nilai_skripsi     = $request->nilai_skripsi;
        $seminar->saran_penguji     = $request->saran_penguji;
        $seminar->file_laporan      = 'files/laporan-sidang/' . $fileName;
        $seminar->save();

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
            'tanggal_sidang'     => 'required',
            'waktu_sidang'       => 'required',
            'judul_skripsi'      => 'required',
            'dosen_penguji1'     => 'required|string|max:255',
            'dosen_penguji2'     => 'required|string|max:255',
            'nilai_skripsi'      => 'required|string',
            'saran_penguji'      => 'required|string',
        ]);

        $sidang = LaporanSidang::findOrFail($id);
        if ($request->hasFile('file_laporan')) {
            // Hapus file_laporan sebelumnya jika ada
            if ($sidang->file_laporan && file_exists(public_path($sidang->file_laporan))) {
                unlink(public_path($sidang->file_laporan));
            }

            $file = $request->file('file_laporan');
            $fileName = strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files/laporan-kemajuan-sidang'), $fileName);
        }
        $sidang->update([
            'tanggal_sidang'     => $request->tanggal_sidang,
            'waktu_sidang'       => $request->waktu_sidang,
            'judul_skripsi'      => $request->judul_skripsi,
            'dosen_penguji1'     => $request->dosen_penguji1,
            'dosen_penguji2'     => $request->dosen_penguji2,
            'nilai_skripsi'      => $request->nilai_skripsi,
            'saran_penguji'      => $request->saran_penguji,
            'file_laporan'       => isset($fileName) ? 'files/laporan-sidang/' . $fileName : $sidang->file_laporan,
        ]);

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sidang = LaporanSidang::findOrFail($id);

        if (LaporanSidang::destroy($id)) {
            // Menghapus file terkait jika ada
            if (!empty($sidang->file_laporan)) {
                if (file_exists(public_path($sidang->file_laporan))) {
                    unlink(public_path($sidang->file_laporan));
            }
        }
            return redirect()->route('laporan-kemajuan-sidang.index')->with('success', 'destroy');
        } else {
            return redirect()->route('laporan-kemajuan-sidang.index')->with('fail', 'destroy');
        }
    }
}
