<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = Pelamar::where('industri_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('pages.pelamar.index', compact('pelamar'));
    }

    public function destroy($id)
    {
        try {
            $pelamar = Pelamar::findOrFail($id);
            $pelamar->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Pelamar Berhasil Dihapus!'
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
            Pelamar::whereIn('id', $ids)->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Pelamar Berhasil Dihapus!'
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
