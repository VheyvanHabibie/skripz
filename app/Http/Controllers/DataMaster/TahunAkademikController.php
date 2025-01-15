<?php

namespace App\Http\Controllers\DataMaster;

use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Http\Controllers\Controller;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thakademik = TahunAkademik::all();
        return view('pages.datamaster.data-thakademik.index', compact('thakademik'));
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
            'tahun_akademik'      => 'required|string|max:255',
            'semester'            => 'required|string|max:255',
            'tanggal_mulai'       => 'required|string|max:255',
            'tanggal_selesai'     => 'required',
            'status_akademik'     => 'required',
        ]);

        $thakademik = new TahunAkademik;

        $thakademik->tahun_akademik     = $request->tahun_akademik;
        $thakademik->semester      = $request->semester;
        $thakademik->tanggal_mulai    = $request->tanggal_mulai;
        $thakademik->tanggal_selesai       = $request->tanggal_selesai;
        $thakademik->status_akademik    = $request->status_akademik;
        $thakademik->save();

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
            'tahun_akademik'      => 'required|string|max:255',
            'semester'            => 'required|string|max:255',
            'tanggal_mulai'       => 'required|string|max:255',
            'tanggal_selesai'     => 'required',
            'status_akademik'     => 'required',
        ]);

        $thakademik = TahunAkademik::findOrFail($id);

        $thakademik->update([
            'tahun_akademik'    => $request->tahun_akademik,
            'semester'          => $request->semester,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'status_akademik'   => $request->status_akademik,
        ]);
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (TahunAkademik::destroy($id)) {
            return redirect()->route('tahun-akademik.index')->with('success', 'destroy');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data tahun-akademik.');
        }
    }
}
