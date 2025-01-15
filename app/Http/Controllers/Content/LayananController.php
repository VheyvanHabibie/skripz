<?php

namespace App\Http\Controllers\Content;

use App\Models\Layanan;
use App\Models\ListLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function index()
    {
        $layanan     = Layanan::first();
        $listlayanan = ListLayanan::orderBy('created_at', 'DESC')->get();
        return view('backend.layanan.index', compact('layanan', 'listlayanan'));
    }

    public function create()
    {
        return view('backend.layanan.create');
    }

    public function edit($id)
    {
        $listlayanan = ListLayanan::findOrFail($id);
        return view('backend.layanan.edit', compact('listlayanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
        ]);

        Layanan::create([
            'title'         => $request->title,
            'content'       => $request->content,
        ]);

        return redirect()->route('layanan.index')->with('success', 'store');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update([
            'title'         => $request->title,
            'content'       => $request->content,
        ]);

        return redirect()->route('layanan.index')->with('success', 'update');
    }
}
