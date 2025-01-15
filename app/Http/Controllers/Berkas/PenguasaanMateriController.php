<?php

namespace App\Http\Controllers\Berkas;

use Illuminate\Http\Request;
use App\Models\PenguasaanMateri;
use App\Http\Controllers\Controller;

class PenguasaanMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penguasaan = PenguasaanMateri::all();
        return view('pages.berkas.penguasaan.index', compact('penguasaan'));
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
            'penguasaan' => 'required|string'
        ]);

        $penguasaan = new PenguasaanMateri;
        $penguasaan->penguasaan = $request->penguasaan;
        $penguasaan->save();

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
            'penguasaan' => 'required|string'
        ]);
        $penguasaan = PenguasaanMateri::findOrFail($id);
        $penguasaan->update(['penguasaan' => $request->penguasaan]);

        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->penguasaan as $data) {
            $penguasaan = PenguasaanMateri::findOrFail($data['id']);
            $penguasaan->update(['nilai' => $data['nilai']]);
        }

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (PenguasaanMateri::destroy($id)) {
            return redirect()->back()->with('success', 'destroy');
        } else {
            return redirect()->back()->with('fail', 'Gagal menghapus data Penguasaan Materi.');
        }
    }
}
