<?php

namespace App\Http\Controllers\Berkas;

use App\Models\Tulisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TulisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tulisan = Tulisan::all();
        return view('pages.berkas.tulisan.index', compact('tulisan'));
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
            'tulisan' => 'required|string'
        ]);

        $tulisan = new Tulisan;
        $tulisan->tulisan = $request->tulisan;
        $tulisan->save();

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
            'tulisan' => 'required|string'
        ]);
        $tulisan = Tulisan::findOrFail($id);
        $tulisan->update(['tulisan' => $request->tulisan]);

        return back()->with('success', 'update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->tulisan as $data) {
            $tulisan = Tulisan::findOrFail($data['id']);
            $tulisan->update(['nilai' => $data['nilai']]);
        }

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Tulisan::destroy($id)) {
            return redirect()->back()->with('success', 'destroy');
        } else {
            return redirect()->back()->with('fail', 'Gagal menghapus data tulisan.');
        }
    }
}
