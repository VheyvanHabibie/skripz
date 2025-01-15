<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Models\ListEkosistem;
use App\Http\Controllers\Controller;

class ListEkosistemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'content'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ekosistem = new ListEkosistem;
        $ekosistem->title     = $request->title;
        $ekosistem->subtitle  = $request->subtitle;
        $ekosistem->content   = $request->content;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/ekosistem/img'), $imageName);

            $ekosistem->image = 'konten/ekosistem/img/' . $imageName;
        }
        $ekosistem->save();

        return redirect()->route('ekosistem.index')->with('success', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ekosistem = ListEkosistem::findOrFail($id);

        $ekosistem->title       = $request->title;
        $ekosistem->subtitle    = $request->subtitle;
        $ekosistem->content     = $request->content;

        if ($request->hasFile('image')) {
            if ($ekosistem->image && file_exists(public_path($ekosistem->image))) {
                unlink(public_path($ekosistem->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/ekosistem/img'), $imageName);

            $ekosistem->image = 'konten/ekosistem/img/' . $imageName;
        }
        $ekosistem->save();

        return redirect()->route('ekosistem.index')->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekosistem = ListEkosistem::findOrFail($id);
        if (ListEkosistem::destroy($id)) {
            if (!empty($ekosistem->image)) {
                if ($ekosistem->image && file_exists(public_path($ekosistem->image))) {
                    unlink(public_path($ekosistem->image));
                }
            }
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'List Ekosistem Pengguna Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'List Ekosistem Pengguna Gagal Dihapus'
            ]);
        }
    }
}
