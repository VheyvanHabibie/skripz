<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Models\MitraPengguna;
use App\Http\Controllers\Controller;

class MitraPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = MitraPengguna::orderBy('created_at', 'DESC')->get();
        return view('backend.mitra.index', compact('mitra'));
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
            'nama_mitra'    => 'required|string|max:255',
            'logo'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('konten/mitra/logo'), $imageName);

        MitraPengguna::create([
            'nama_mitra'   => $request->nama_mitra,
            'logo'    => 'konten/mitra/logo/' . $imageName,
        ]);

        return back()->with('success', 'store');
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
            'nama_mitra'   => 'required|string|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mitra = MitraPengguna::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($mitra->logo && file_exists(public_path($mitra->logo))) {
                unlink(public_path($mitra->logo));
            }

            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('konten/mitra/logo'), $imageName);

            $mitra->logo = 'konten/mitra/logo/' . $imageName;
        }

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->save();

        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = MitraPengguna::findOrFail($id);
        if (MitraPengguna::destroy($id)) {
            if (!empty($mitra->logo)) {
                if ($mitra->logo && file_exists(public_path($mitra->logo))) {
                    unlink(public_path($mitra->logo));
                }
            }
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'Mitra Pengguna Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Mitra Pengguna Gagal Dihapus'
            ]);
        }
    }
}
