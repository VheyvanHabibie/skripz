<?php

namespace App\Http\Controllers\Content;

use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view('backend.beranda.index', compact('beranda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beranda = new Beranda;
        $beranda->title     = $request->title;
        $beranda->subtitle  = $request->subtitle;
        $beranda->description   = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/beranda/img'), $imageName);

            $beranda->image = 'konten/beranda/img/' . $imageName;
        }
        $beranda->save();

        return redirect()->route('beranda.index')->with('success', 'store');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beranda = Beranda::findOrFail($id);

        $beranda->title       = $request->title;
        $beranda->subtitle    = $request->subtitle;
        $beranda->description = $request->description;

        if ($request->hasFile('image')) {
            if ($beranda->image && file_exists(public_path($beranda->image))) {
                unlink(public_path($beranda->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/beranda/img'), $imageName);

            $beranda->image = 'konten/beranda/img/' . $imageName;
        }
        $beranda->save();

        return redirect()->route('beranda.index')->with('success', 'update');
    }
}
