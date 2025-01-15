<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Models\Klien;
use App\Http\Controllers\Controller;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klien = Klien::orderBy('created_at', 'DESC')->get();
        return view('backend.klien.index', compact('klien'));
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
            'nama_klien'    => 'required|string|max:255',
            'logo'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('konten/klien/logo'), $imageName);

        Klien::create([
            'nama_klien'   => $request->nama_klien,
            'logo'    => 'konten/klien/logo/' . $imageName,
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
            'nama_klien'   => 'required|string|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $klien = Klien::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($klien->logo && file_exists(public_path($klien->logo))) {
                unlink(public_path($klien->logo));
            }

            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('konten/klien/logo'), $imageName);

            $klien->logo = 'konten/klien/logo/' . $imageName;
        }

        $klien->nama_klien = $request->nama_klien;
        $klien->save();

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
        $klien = Klien::findOrFail($id);
        if (Klien::destroy($id)) {
            if (!empty($klien->logo)) {
                if ($klien->logo && file_exists(public_path($klien->logo))) {
                    unlink(public_path($klien->logo));
                }
            }
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'Klien Pengguna Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Klien Pengguna Gagal Dihapus'
            ]);
        }
    }
}
