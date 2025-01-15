<?php

namespace App\Http\Controllers\Content;

use App\Models\Ekosistem;
use Illuminate\Http\Request;
use App\Models\ListEkosistem;
use App\Http\Controllers\Controller;

class EkosistemController extends Controller
{
    public function index()
    {
        $ekosistem = Ekosistem::first();
        $listekosistem = ListEkosistem::orderBy('created_at', 'DESC')->get();
        return view('backend.ekosistem.index', compact('ekosistem', 'listekosistem'));
    }

    public function create()
    {
        return view('backend.ekosistem.create');
    }

    public function edit($id)
    {
        $listekosistem = ListEkosistem::findOrFail($id);
        return view('backend.ekosistem.edit', compact('listekosistem'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
        ]);

        Ekosistem::create([
            'title'         => $request->title,
            'content'       => $request->content,
        ]);

        return redirect()->route('ekosistem.index')->with('success', 'store');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
        ]);

        $ekosistem = Ekosistem::findOrFail($id);
        $ekosistem->update([
            'title'         => $request->title,
            'content'       => $request->content,
        ]);

        return redirect()->route('ekosistem.index')->with('success', 'update');
    }
}
