<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lowongan;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = Lowongan::where('industri_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('pages.lowongan.index', compact('lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsis  = Provinsi::all();
        return view('pages.lowongan.create', compact('provinsis'));
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
            'nama_perusahaan'       => 'required|string|max:255',
            'posisi_pekerjaan'      => 'required|string|max:255',
            'lokasi_pekerjaan'      => 'required|string',
            'provinsi_id'           => 'required|exists:provinsis,id',
            'kabupaten_id'          => 'required|exists:kabupatens,id',
            'deskripsi_pekerjaan'   => 'nullable',
            'persyaratan_pekerjaan' => 'nullable',
            'waktu_mulai'           => 'nullable|date_format:H:i',
            'waktu_selesai'         => 'nullable|date_format:H:i',
            'hari_kerja_mulai'      => 'nullable|string',
            'hari_kerja_selesai'    => 'nullable|string',
            'tanggal_berakhir'      => 'required|date|after_or_equal:today',
        ]);

        Lowongan::create([
            'industri_id'           => Auth::user()->id,
            'nama_perusahaan'       => $request->nama_perusahaan,
            'posisi_pekerjaan'      => $request->posisi_pekerjaan,
            'lokasi_pekerjaan'      => $request->lokasi_pekerjaan,
            'provinsi_id'           => $request->provinsi_id,
            'kabupaten_id'          => $request->kabupaten_id,
            'deskripsi_pekerjaan'   => $request->deskripsi_pekerjaan,
            'persyaratan_pekerjaan' => $request->persyaratan_pekerjaan,
            'waktu_mulai'           => $request->waktu_mulai,
            'waktu_selesai'         => $request->waktu_selesai,
            'hari_kerja_mulai'      => $request->hari_kerja_mulai,
            'hari_kerja_selesai'    => $request->hari_kerja_selesai,
            'tanggal_berakhir'      => $request->tanggal_berakhir,
        ]);

        return redirect()->route('lowongan.index')->with('success', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $provinsis  = Provinsi::all();
        return view('pages.lowongan.show', compact('lowongan', 'provinsis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $provinsis  = Provinsi::all();
        return view('pages.lowongan.edit', compact('lowongan', 'provinsis'));
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
            'nama_perusahaan'       => 'required|string|max:255',
            'posisi_pekerjaan'      => 'required|string|max:255',
            'lokasi_pekerjaan'      => 'required|string',
            'provinsi_id'           => 'required|exists:provinsis,id',
            'kabupaten_id'          => 'required|exists:kabupatens,id',
            'deskripsi_pekerjaan'   => 'nullable',
            'persyaratan_pekerjaan' => 'nullable',
            'waktu_mulai'           => 'nullable|date_format:H:i',
            'waktu_selesai'         => 'nullable|date_format:H:i',
            'hari_kerja_mulai'      => 'nullable|string',
            'hari_kerja_selesai'    => 'nullable|string',
            'tanggal_berakhir'      => 'required|date|after_or_equal:today',
        ]);

        $lowongan = Lowongan::findOrFail($id);

        $lowongan->update([
            'industri_id'           => Auth::user()->id,
            'nama_perusahaan'       => $request->nama_perusahaan,
            'posisi_pekerjaan'      => $request->posisi_pekerjaan,
            'lokasi_pekerjaan'      => $request->lokasi_pekerjaan,
            'provinsi_id'           => $request->provinsi_id,
            'kabupaten_id'          => $request->kabupaten_id,
            'deskripsi_pekerjaan'   => $request->deskripsi_pekerjaan,
            'persyaratan_pekerjaan' => $request->persyaratan_pekerjaan,
            'waktu_mulai'           => $request->waktu_mulai,
            'waktu_selesai'         => $request->waktu_selesai,
            'hari_kerja_mulai'      => $request->hari_kerja_mulai,
            'hari_kerja_selesai'    => $request->hari_kerja_selesai,
            'tanggal_berakhir'      => $request->tanggal_berakhir,
        ]);

        return redirect()->route('lowongan.index')->with('success', 'store');

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
            $lowongan = Lowongan::findOrFail($id);
            $lowongan->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Lowongan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    public function search(Request $request)
    {
        // Validasi input `search_key`
        $validated = $request->validate([
            'search_key' => 'nullable|string|max:255',
        ]);

        try {
            // Jika tidak ada kata kunci pencarian
            if (empty($validated['search_key'])) {
                // Mengambil semua lowongan terbaru
                $jobs = Lowongan::orderBy('created_at', 'DESC')->get();
            } else {
                // Filter lowongan berdasarkan `search_key`
                $jobs = Lowongan::where('posisi_pekerjaan', 'LIKE', '%' . $validated['search_key'] . '%')
                    ->orWhere('lokasi_pekerjaan', 'LIKE', '%' . $validated['search_key'] . '%')
                    ->orderBy('created_at', 'DESC')
                    ->get();
            }

            // Format response data
            $data = $jobs->map(function ($job) {
                return [
                    'id' => $job->id,
                    'industri_id' => $job->industri_id,
                    'posisi_pekerjaan' => $job->posisi_pekerjaan,
                    'nama_perusahaan' => $job->nama_perusahaan,
                    'deskripsi_pekerjaan' => $job->deskripsi_pekerjaan,
                    'persyaratan_pekerjaan' => $job->persyaratan_pekerjaan,
                    'lokasi_pekerjaan' => $job->lokasi_pekerjaan,
                    'kabupaten' => [
                        'type' => $job->kabupaten->type ?? '',
                        'name' => $job->kabupaten->name ?? '',
                    ],
                    'provinsi' => [
                        'name' => $job->provinsi->name ?? '',
                    ],
                    'tanggal_berakhir' => Carbon::parse($job->tanggal_berakhir)->locale('id')->translatedFormat(' d F Y'),
                    'waktu_mulai' => date('H:i', strtotime($job->waktu_mulai)),
                    'waktu_selesai' => date('H:i', strtotime($job->waktu_selesai)),
                    'hari_kerja_mulai' => $job->hari_kerja_mulai,
                    'hari_kerja_selesai' => $job->hari_kerja_selesai,
                ];
            });

            // Response success
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            // Response error jika terjadi masalah
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memproses pencarian.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
