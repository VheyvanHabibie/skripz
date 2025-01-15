<?php

namespace App\Http\Controllers\Content;

use App\Models\Tentang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::first();
        return view('backend.tentang.index', compact('tentang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tentang = new Tentang;
        $tentang->title     = $request->title;
        $tentang->subtitle  = $request->subtitle;
        $tentang->description   = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/tentang/img'), $imageName);

            $tentang->image = 'konten/tentang/img/' . $imageName;
        }
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'store');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tentang = Tentang::findOrFail($id);

        $tentang->title       = $request->title;
        $tentang->subtitle    = $request->subtitle;
        $tentang->description = $request->description;

        if ($request->hasFile('image')) {
            if ($tentang->image && file_exists(public_path($tentang->image))) {
                unlink(public_path($tentang->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/tentang/img'), $imageName);

            $tentang->image = 'konten/tentang/img/' . $imageName;
        }
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'update');
    }
}
