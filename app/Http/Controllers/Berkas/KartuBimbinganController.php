<?php

namespace App\Http\Controllers\Berkas;

use Illuminate\Http\Request;
use App\Models\KartuBimbingan;
use App\Http\Controllers\Controller;

class KartuBimbinganController extends Controller
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
        //
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
    public function update(Request $request)
    {
        $kartu = KartuBimbingan::first();
        $kartu->update(
            $request->only('nim', 'nama', 'judul_skripsi','perubahan_judul_skripsi')
        );
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
