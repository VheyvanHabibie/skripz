<?php

namespace App\Http\Controllers\Content;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        return view('backend.paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.paket.create');
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
            'kategori'      => 'required|string|max:255',
            'title'         => 'required|string|max:255',
            'jenis'         => 'required|string|max:255',
            'description'   => 'required',
            'fitur'         => 'required',
            'harga'         => 'required|numeric',
            'duration'      => 'required|string|max:255',
        ]);

        Paket::create([
            'kategori'      => $request->kategori,
            'title'         => $request->title,
            'jenis'         => $request->jenis,
            'description'   => $request->description,
            'fitur'         => $request->fitur,
            'harga'         => $request->harga,
            'duration'      => $request->duration,
        ]);

        return redirect()->route('paket.index')->with('success', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket = Paket::findOrFail($id);
        return view('backend.paket.show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('backend.paket.edit', compact('paket'));
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
            'kategori'      => 'required|string|max:255',
            'title'         => 'required|string|max:255',
            'jenis'         => 'required|string|max:255',
            'description'   => 'required',
            'fitur'         => 'required',
            'harga'         => 'required|numeric',
            'duration'      => 'required|string|max:255',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update([
            'kategori'      => $request->kategori,
            'jenis'         => $request->jenis,
            'title'         => $request->title,
            'description'   => $request->description,
            'fitur'         => $request->fitur,
            'harga'         => $request->harga,
            'duration'      => $request->duration,
        ]);

        return redirect()->route('paket.index')->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $paket = Paket::findOrFail($id);
            $paket->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Paket Berhasil Dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error deleting data: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteAll(Request $request)
    {
        try {
            $ids = $request->input('ids');
            Paket::whereIn('id', $ids)->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Paket Berhasil Dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error deleting data: ' . $e->getMessage()
            ]);
        }
    }
}
