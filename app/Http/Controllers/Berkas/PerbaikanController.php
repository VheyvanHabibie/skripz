<?php

namespace App\Http\Controllers\Berkas;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerbaikanController extends Controller
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
            'bab'         => 'required|string',
            'perbaikan'   => 'required|string',
            'selesai'     => 'required',
        ]);

        $perbaikan = new Perbaikan;
        $perbaikan->bab = $request->bab;
        $perbaikan->perbaikan = $request->perbaikan;
        $perbaikan->selesai = $request->selesai;
        $perbaikan->save();

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
            'bab'         => 'required|string',
            'perbaikan'   => 'required|string',
            'selesai'     => 'required',
        ]);
        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->update([
            'bab'      => $request->bab,
            'perbaikan'      => $request->perbaikan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->perbaikan as $perbaikanData) {
            $perbaikan = Perbaikan::findOrFail($perbaikanData['id']);
            $perbaikan->update(['selesai' => isset($perbaikanData['selesai']) ? 1 : 0]);
        }
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
