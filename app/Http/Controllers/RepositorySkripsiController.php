<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepositorySkripsi;
use Illuminate\Support\Facades\Auth;

class RepositorySkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repo = RepositorySkripsi::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('pages.repository.index', compact('repo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.repository.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'links'         => 'required',
        ]);

        $repo = new RepositorySkripsi;
        $repo->user_id      = Auth::user()->id;
        $repo->judul        = $request->judul;
        $repo->deskripsi    = $request->deskripsi;
        $repo->links        = $request->links;
        $repo->save();

        return redirect()->route('repository-skripsi.index')->with('success', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $repo = RepositorySkripsi::findOrFail($id);
        return view('pages.repository.show', compact('repo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $repo = RepositorySkripsi::findOrFail($id);
        return view('pages.repository.edit', compact('repo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'links'         => 'required',
        ]);

        $repo = RepositorySkripsi::findOrFail($id);
        $repo->update([
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'links'         => $request->links,
        ]);

        return redirect()->route('repository-skripsi.index')->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (RepositorySkripsi::destroy($id)) {
            return redirect()->route('repository-skripsi.index')->with('success', 'destroy');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data repository skripsi.');
        }
    }
}
