<?php

namespace App\Http\Controllers\Berkas;

use App\Models\Asistensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsistensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'pertemuan'  => 'required|string',
            'materi'     => 'required|string',
            'bab'        => 'required|string',
            'paraf'      => 'required',
        ]);

        $asistensi = new Asistensi;
        $asistensi->pertemuan = $request->pertemuan;
        $asistensi->materi = $request->materi;
        $asistensi->bab = $request->bab;
        $asistensi->paraf = $request->paraf;
        $asistensi->save();

        return back()->with('success','store');
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
    public function edit(Request $request, string $id)
    {
        $request->validate([
            'pertemuan'  => 'required|string',
            'materi'     => 'required|string',
            'bab'        => 'required|string',
            'paraf'      => 'required',
        ]);
        $asistensi = Asistensi::findOrFail($id);
        $asistensi->update([
            'pertemuan'      => $request->pertemuan,
            'materi'      => $request->materi,
            'bab'      => $request->bab,
        ]);
        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->materi as $asistensiData) {
            $asistensi = Asistensi::findOrFail($asistensiData['id']);
            $asistensi->update(['paraf' => isset($asistensiData['paraf']) ? 1 : 0]);
        }
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Asistensi::destroy($id)) {
            return response()->json(['status' => 500, 'message' => 'Gagal menghapus data']);
        }

        try {
            return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => 'Error menghapus data: ' . $e->getMessage()]);
        }
    }
}
