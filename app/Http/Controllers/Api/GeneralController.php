<?php

namespace App\Http\Controllers\Api;

use App\Models\Progress;
use App\Models\Penjadwalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function jadwal() {
        $penjadwalan = Penjadwalan::all();
        return response()->json([
            'status' => 200,
            'data'   => $penjadwalan
        ]);
    }
    public function progress() {
        $progress = Progress::all();
        return response()->json([
            'status' => 200,
            'data'   => $progress
        ]);
    }
    public function progress_update(Request $request, $id){
        $request->validate([
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $progress = Progress::findOrFail($id);
        $progress->update([
            'status' => $request->status,
        ]);
        return response()->json([
            'status' => 200,
            'message'   => 'success'
        ]);
    }
}
