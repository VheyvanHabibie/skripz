<?php

namespace App\Http\Controllers\Content;

use App\Models\Kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Content\KontakController;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::orderBy('created_at', 'DESC')->get();
        return view('backend.kontak.index', compact('kontak'));
    }

    public function destroy($id)
    {
        try {
            $kontak = Kontak::findOrFail($id);
            $kontak->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Kontak Berhasil Dihapus!'
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
            Kontak::whereIn('id', $ids)->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Kontak Berhasil Dihapus!'
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
