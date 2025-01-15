<?php

namespace App\Http\Controllers\Berkas;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persyaratan = Persyaratan::all();
        return view('pages.berkas.persyaratan.index', compact('persyaratan'));
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
            'persyaratan' => 'required|string',
        ]);

        $persyaratan = new Persyaratan;
        $persyaratan->persyaratan = $request->persyaratan;
        $persyaratan->save();

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
    public function edit(Request $request, $id)
    {
        $request->validate([
            'persyaratan' => 'required|string',
        ]);
        $persyaratan = Persyaratan::findOrFail($id);
        $persyaratan->update([
            'persyaratan'      => $request->persyaratan,
        ]);
        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->persyaratan as $persyaratanData) {
            $persyaratan = Persyaratan::findOrFail($persyaratanData['id']);
            $persyaratan->update(['status' => isset($persyaratanData['status']) ? 1 : 0]);
        }
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Persyaratan::destroy($id)) {
            return response()->json(['status' => 500, 'message' => 'Gagal menghapus data']);
        }

        try {
            return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => 'Error menghapus data: ' . $e->getMessage()]);
        }
    }
}
