<?php

namespace App\Http\Controllers\Content;

use App\Models\ListLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListLayananController extends Controller
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

        $layanan = new ListLayanan;
        $layanan->title     = $request->title;
        $layanan->subtitle  = $request->subtitle;
        $layanan->content   = $request->content;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/layanan/img'), $imageName);

            $layanan->image = 'konten/layanan/img/' . $imageName;
        }
        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'store');
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

        $layanan = ListLayanan::findOrFail($id);

        $layanan->title       = $request->title;
        $layanan->subtitle    = $request->subtitle;
        $layanan->content     = $request->content;

        if ($request->hasFile('image')) {
            if ($layanan->image && file_exists(public_path($layanan->image))) {
                unlink(public_path($layanan->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('konten/layanan/img'), $imageName);

            $layanan->image = 'konten/layanan/img/' . $imageName;
        }
        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = ListLayanan::findOrFail($id);
        if (ListLayanan::destroy($id)) {
            if (!empty($layanan->image)) {
                if ($layanan->image && file_exists(public_path($layanan->image))) {
                    unlink(public_path($layanan->image));
                }
            }
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'List Layanan Pengguna Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'List Layanan Pengguna Gagal Dihapus'
            ]);
        }
    }
}
