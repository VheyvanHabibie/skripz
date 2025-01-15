<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortalInformasiController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::orderBy('created_at', 'DESC')->get();
        return view('pages.portalinformasi', compact('lowongan'));
    }

    public function lamaran(Request $request)
    {
        $validated = $request->validate([
            'lowongan_id'             => 'required',
            'industri_id'             => 'required',
            'nama_pelamar'            => 'required|string|max:255',
            'email_pelamar'           => 'required|string|max:255',
            'alamat_pelamar'          => 'required|string|max:255',
            'file_cv'                 => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        $fileName = time() . '_' . $request->file('file_cv')->getClientOriginalName();
        $request->file('file_cv')->move(public_path('documents/pelamar'), $fileName);

        $pelamar = Pelamar::create([
            'lowongan_id'          => $request->lowongan_id,
            'industri_id'          => $request->industri_id,
            'nama_pelamar'         => $request->nama_pelamar,
            'email_pelamar'        => $request->email_pelamar,
            'alamat_pelamar'       => $request->alamat_pelamar,
            'file_cv'              => 'documents/pelamar/' . $fileName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lamaran Berhasil Dikirim',
            'id'      => $request->lowongan_id
        ]);
    }
}
