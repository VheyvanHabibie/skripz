<?php

namespace App\Http\Controllers\Content;

use App\Models\Unduh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnduhController extends Controller
{
    public function index()
    {
        $unduh = Unduh::first();
        return view('backend.unduh.index', compact('unduh'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $unduh = new Unduh;
        $unduh->title     = $request->title;
        $unduh->subtitle  = $request->subtitle;
        $unduh->description   = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/unduh/img'), $imageName);

            $unduh->image = 'konten/unduh/img/' . $imageName;
        }
        $unduh->save();

        return redirect()->route('unduhpage.index')->with('success', 'store');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $unduh = Unduh::findOrFail($id);

        $unduh->title       = $request->title;
        $unduh->subtitle    = $request->subtitle;
        $unduh->description = $request->description;

        if ($request->hasFile('image')) {
            if ($unduh->image && file_exists(public_path($unduh->image))) {
                unlink(public_path($unduh->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/unduh/img'), $imageName);

            $unduh->image = 'konten/unduh/img/' . $imageName;
        }
        $unduh->save();

        return redirect()->route('unduhpage.index')->with('success', 'update');
    }
}
