<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenLangganan;
use App\Http\Controllers\Controller;

class ManajemenLanggananController extends Controller
{
    public function index()
    {
        $langganan = ManajemenLangganan::orderBy('created_at', 'DESC')->get();
        return view('pages.managemen.langganan.index', compact('langganan'));
    }

    public function destroy($id)
    {
        try {
            $langganan = ManajemenLangganan::findOrFail($id);
            $langganan->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Manajemen Langganan Berhasil Dihapus!'
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
            ManajemenLangganan::whereIn('id', $ids)->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Manajemen Langganan Berhasil Dihapus!'
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
