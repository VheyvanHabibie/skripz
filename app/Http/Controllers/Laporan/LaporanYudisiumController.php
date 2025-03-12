<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\LaporanYudisium;
use App\Http\Controllers\Controller;

class LaporanYudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yudisium = LaporanYudisium::orderBy('created_at', 'DESC')->get();
        $mahasiswa = Mahasiswa::all();
        return view('pages.laporan.lapor-yudisium.index', compact('yudisium', 'mahasiswa'));
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
            'tanggal_sidang'        => 'required',
            'mahasiswa_id'          => 'required',
            'ipk'                   => 'required',
            'peringkat'             => 'required',
            'peringkat_kelulusan'   => 'required',
        ]);

        $yudisium = new LaporanYudisium;

        $yudisium->tanggal_sidang = $request->tanggal_sidang;
        $yudisium->mahasiswa_id = $request->mahasiswa_id;
        $yudisium->ipk = $request->ipk;
        $yudisium->peringkat = $request->peringkat;
        $yudisium->peringkat_kelulusan = $request->peringkat_kelulusan;
        $yudisium->save();

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
            'tanggal_sidang'      => 'required',
            'mahasiswa_id'          => 'required',
            'ipk'                 => 'required',
            'peringkat'       => 'required',
            'peringkat_kelulusan'  => 'required',
        ]);

        $yudisium = LaporanYudisium::findOrFail($id);
        $yudisium->update([
            'tanggal_sidang'      => $request->tanggal_sidang,
            'mahasiswa_id'        => $request->mahasiswa_id,
            'ipk'                 => $request->ipk,
            'peringkat'       => $request->peringkat,
            'peringkat_kelulusan'  => $request->peringkat_kelulusan,
        ]);
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proposal = LaporanYudisium::findOrFail($id);

        if (LaporanYudisium::destroy($id)) {
            return redirect()->route('laporan-yudisium.index')->with('success', 'destroy');
        } else {
            return redirect()->route('laporan-yudisium.index')->with('fail', 'destroy');
        }
    }
}
