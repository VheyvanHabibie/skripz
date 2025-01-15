<?php

namespace App\Http\Controllers\Berkas;

use App\Models\Presentasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentasi = Presentasi::all();
        return view('pages.berkas.presentasi.index', compact('presentasi'));
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
            'presentasi' => 'required|string'
        ]);

        $presentasi = new Presentasi;
        $presentasi->presentasi = $request->presentasi;
        $presentasi->save();

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
            'presentasi' => 'required|string'
        ]);
        $presentasi = Presentasi::findOrFail($id);
        $presentasi->update(['presentasi' => $request->presentasi]);

        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->presentasi as $data) {
            $presentasi = Presentasi::findOrFail($data['id']);
            $presentasi->update(['nilai' => $data['nilai']]);
        }

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Presentasi::destroy($id)) {
            return redirect()->back()->with('success', 'destroy');
        } else {
            return redirect()->back()->with('fail', 'Gagal menghapus data presentasi.');
        }
    }
}
