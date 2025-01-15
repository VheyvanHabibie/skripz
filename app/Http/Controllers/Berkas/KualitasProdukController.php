<?php

namespace App\Http\Controllers\Berkas;

use Illuminate\Http\Request;
use App\Models\KualitasProduk;
use App\Http\Controllers\Controller;

class KualitasProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kualitas = KualitasProduk::all();
        return view('pages.berkas.kualitas.index', compact('kualitas'));
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
            'kualitas' => 'required|string'
        ]);

        $kualitas = new KualitasProduk;
        $kualitas->kualitas = $request->kualitas;
        $kualitas->save();

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
    public function edit(Request $request, $id)
    {
        $request->validate([
            'kualitas' => 'required|string'
        ]);
        $kualitas = KualitasProduk::findOrFail($id);
        $kualitas->update(['kualitas' => $request->kualitas]);

        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->kualitas as $data) {
            $kualitas = KualitasProduk::findOrFail($data['id']);
            $kualitas->update(['nilai' => $data['nilai']]);
        }

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (KualitasProduk::destroy($id)) {
            return redirect()->back()->with('success', 'destroy');
        } else {
            return redirect()->back()->with('fail', 'Gagal menghapus Kualitas Produk.');
        }
    }
}
