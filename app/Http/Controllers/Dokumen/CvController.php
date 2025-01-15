<?php

namespace App\Http\Controllers\Dokumen;

use App\Models\DataPersonal;
use Illuminate\Http\Request;
use App\Models\DataEducation;
use App\Models\DataExperience;
use App\Models\DataOrganization;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    public function index()
    {
        $dataPersonal = DataPersonal::latest()->first();
        $dataExperience = DataExperience::where('personal_id', $dataPersonal->id ?? 0)->latest()->first();
        $dataEducation = DataEducation::where('personal_id', $dataPersonal->id ?? 0)->latest()->first();
        $dataOrganization = DataOrganization::where('personal_id', $dataPersonal->id ?? 0)->latest()->first();

        $dataExperiences = DataExperience::where('personal_id', $dataPersonal->id ?? 0)->get();
        $dataEducations = DataEducation::where('personal_id', $dataPersonal->id ?? 0)->get();
        return view('pages.cv.index', compact('dataPersonal', 'dataExperience', 'dataExperiences', 'dataEducation', 'dataEducations', 'dataOrganization'));
    }

    public function store(Request $request)
{
    // Validasi input data
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'no_telpon' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'url_linkedin' => 'nullable|url',
        'url_portofolio' => 'nullable|url',
        'alamat' => 'nullable|string',
        'deskripsi_singkat' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        // Validasi untuk array pendidikan
        'nama_sekolah' => 'required|array',
        'nama_sekolah.*' => 'required|string|max:255',
        'lokasi_perusahaan' => 'required|array',
        'lokasi_perusahaan.*' => 'required|string|max:255',
        // Validasi untuk array pengalaman kerja
        'nama_perusahaan' => 'required|array',
        'nama_perusahaan.*' => 'required|string|max:255',
        'jabatan' => 'required|array',
        'jabatan.*' => 'required|string|max:255',
    ]);

    // Simpan data personal
    $dataPersonal = new DataPersonal();
    $dataPersonal->user_id = Auth::user()->id; // Menggunakan ID user yang sedang login
    $dataPersonal->nama_lengkap = $request->nama_lengkap;
    $dataPersonal->no_telpon = $request->no_telpon;
    $dataPersonal->email = $request->email;
    $dataPersonal->url_linkedin = $request->url_linkedin;
    $dataPersonal->url_portofolio = $request->url_portofolio;
    $dataPersonal->alamat = $request->alamat;
    $dataPersonal->deskripsi_singkat = $request->deskripsi_singkat;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/fotos'), $fileName);
        $dataPersonal->foto = 'uploads/fotos/' . $fileName;
    }

    $dataPersonal->save();

    // Simpan data pendidikan
    foreach ($request->nama_sekolah as $index => $namaSekolah) {
        $dataEducation = new DataEducation();
        $dataEducation->personal_id = $dataPersonal->id;
        $dataEducation->nama_sekolah = $namaSekolah;
        $dataEducation->lokasi_education = $request->lokasi_education[$index];
        $dataEducation->bulan_mulai_education = $request->bulan_mulai_education[$index];
        $dataEducation->tahun_mulai_education = $request->tahun_mulai_education[$index];
        $dataEducation->bulan_selesai_education = $request->bulan_selesai_education[$index];
        $dataEducation->tahun_selesai_education = $request->tahun_selesai_education[$index];
        $dataEducation->jenjang_sekolah = $request->jenjang_sekolah[$index];
        $dataEducation->ipk = $request->ipk[$index];
        $dataEducation->ipk_max = $request->ipk_max[$index];
        $dataEducation->pencapaian = $request->pencapaian[$index];
        $dataEducation->link_sertifikat = $request->deskripsi_education[$index];
        $dataEducation->deskripsi_education = $request->deskripsi_education[$index];
        $dataEducation->save();
    }

    // Simpan data pengalaman kerja
    foreach ($request->nama_perusahaan as $index => $namaPerusahaan) {
        $dataExperience = new DataExperience();
        $dataExperience->personal_id = $dataPersonal->id;
        $dataExperience->nama_perusahaan = $namaPerusahaan;
        $dataExperience->jabatan = $request->jabatan[$index];
        $dataExperience->lokasi_perusahaan = $request->lokasi_perusahaan[$index];
        $dataExperience->deskripsi_perusahaan = $request->deskripsi_perusahaan[$index];
        $dataExperience->bulan_mulai_experience = $request->bulan_mulai_experience[$index];
        $dataExperience->tahun_mulai_experience = $request->tahun_mulai_experience[$index];
        $dataExperience->bulan_selesai_experience = $request->bulan_selesai_experience[$index];
        $dataExperience->tahun_selesai_experience = $request->tahun_selesai_experience[$index];
        $dataExperience->portofolio_kerja = $request->portofolio_kerja[$index];
        $dataExperience->save();
    }

    return redirect()->back()->with('success', 'store');
}

public function show() {
    $userId = Auth::user()->id;

    $dataPersonal = DataPersonal::where('user_id', $userId)->first();
    $dataEducation = DataEducation::where('personal_id', $dataPersonal->id)->get();
    $dataExperience = DataExperience::where('personal_id', $dataPersonal->id)->get();

    return view('pages.cv.show', compact('dataPersonal', 'dataEducation', 'dataExperience'));
}

    public function DataPersonalStore(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'url_linkedin' => 'nullable|url',
            'url_portofolio' => 'nullable|url',
            'alamat' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        // Simpan data personal
        $dataPersonal = new DataPersonal();
        $dataPersonal->user_id = Auth::user()->id;
        $dataPersonal->nama_lengkap = $request->nama_lengkap;
        $dataPersonal->no_telpon = $request->no_telpon;
        $dataPersonal->email = $request->email;
        $dataPersonal->url_linkedin = $request->url_linkedin;
        $dataPersonal->url_portofolio = $request->url_portofolio;
        $dataPersonal->alamat = $request->alamat;
        $dataPersonal->deskripsi_singkat = $request->deskripsi_singkat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fotos'), $fileName);
            $dataPersonal->foto = 'uploads/fotos/' . $fileName;
        }

        $dataPersonal->save();
        return response()->json(['success' => true, 'id' => $dataPersonal->id]);
    }

    public function DataPersonalUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'url_linkedin' => 'nullable|url',
            'url_portofolio' => 'nullable|url',
            'alamat' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        // Simpan data personal
        $dataPersonal = DataPersonal::findOrFail($id);
        $dataPersonal->user_id = Auth::user()->id;
        $dataPersonal->nama_lengkap = $request->nama_lengkap;
        $dataPersonal->no_telpon = $request->no_telpon;
        $dataPersonal->email = $request->email;
        $dataPersonal->url_linkedin = $request->url_linkedin;
        $dataPersonal->url_portofolio = $request->url_portofolio;
        $dataPersonal->alamat = $request->alamat;
        $dataPersonal->deskripsi_singkat = $request->deskripsi_singkat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fotos'), $fileName);
            $dataPersonal->foto = 'uploads/fotos/' . $fileName;
        }

        $dataPersonal->save();
        return response()->json(['success' => true, 'id' => $id]);
    }

    public function DataEducationStore(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|array',
            'nama_sekolah.*' => 'required|string|max:255',
            'lokasi_education' => 'required|array',
            'lokasi_education.*' => 'required|string|max:255',
            'bulan_mulai_education' => 'required|array',
            'bulan_mulai_education.*' => 'required',
            'tahun_mulai_education' => 'required|array',
            'tahun_mulai_education.*' => 'required',
            'bulan_selesai_education' => 'nullable|array',
            'bulan_selesai_education.*' => 'nullable',
            'tahun_selesai_education' => 'nullable|array',
            'tahun_selesai_education.*' => 'nullable',
            'jenjang_sekolah' => 'required|array',
            'jenjang_sekolah.*' => 'required|string|max:255',
            'ipk' => 'nullable|array',
            'ipk.*' => 'nullable|numeric|min:0|max:4',
            'ipk_max' => 'nullable|array',
            'ipk_max.*' => 'nullable|numeric|min:0|max:4',
            'pencapaian' => 'nullable|array',
            'pencapaian.*' => 'nullable|string|max:1000',
            'link_sertifikat' => 'nullable|array',
            'link_sertifikat.*' => 'nullable|url',
            'deskripsi_education' => 'nullable|array',
            'deskripsi_education.*' => 'nullable|string|max:1000',
        ]);

        foreach ($request->nama_sekolah as $index => $namaSekolah) {
            $dataEducation = new DataEducation();
            $dataEducation->personal_id = $request->personal_id;
            $dataEducation->nama_sekolah = $namaSekolah;
            $dataEducation->lokasi_education = $request->lokasi_education[$index];
            $dataEducation->bulan_mulai_education = $request->bulan_mulai_education[$index];
            $dataEducation->tahun_mulai_education = $request->tahun_mulai_education[$index];
            $dataEducation->bulan_selesai_education = $request->bulan_selesai_education[$index];
            $dataEducation->tahun_selesai_education = $request->tahun_selesai_education[$index];
            $dataEducation->jenjang_sekolah = $request->jenjang_sekolah[$index];
            $dataEducation->ipk = $request->ipk[$index];
            $dataEducation->ipk_max = $request->ipk_max[$index];
            $dataEducation->pencapaian = $request->pencapaian[$index];
            $dataEducation->link_sertifikat = $request->link_sertifikat[$index] ?? null;
            $dataEducation->deskripsi_education = $request->deskripsi_education[$index];
            $dataEducation->save();
        }

        return response()->json(['success' => true, 'id' => $dataEducation->personal_id]);
    }

    public function DataEducationUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required|array',
            'nama_sekolah.*' => 'required|string|max:255',
            'lokasi_education' => 'required|array',
            'lokasi_education.*' => 'required|string|max:255',
            'bulan_mulai_education' => 'required|array',
            'bulan_mulai_education.*' => 'required',
            'tahun_mulai_education' => 'required|array',
            'tahun_mulai_education.*' => 'required',
            'bulan_selesai_education' => 'nullable|array',
            'bulan_selesai_education.*' => 'nullable',
            'tahun_selesai_education' => 'nullable|array',
            'tahun_selesai_education.*' => 'nullable',
            'jenjang_sekolah' => 'required|array',
            'jenjang_sekolah.*' => 'required|string|max:255',
            'ipk' => 'nullable|array',
            'ipk.*' => 'nullable|numeric|min:0|max:4',
            'ipk_max' => 'nullable|array',
            'ipk_max.*' => 'nullable|numeric|min:0|max:4',
            'pencapaian' => 'nullable|array',
            'pencapaian.*' => 'nullable|string|max:1000',
            'link_sertifikat' => 'nullable|array',
            'link_sertifikat.*' => 'nullable|url',
            'deskripsi_education' => 'nullable|array',
            'deskripsi_education.*' => 'nullable|string|max:1000',
        ]);

        foreach ($request->nama_sekolah as $index => $namaSekolah) {
            $dataEducation = DataEducation::findOrFail($id);
            $dataEducation->personal_id = $request->personal_id;
            $dataEducation->nama_sekolah = $namaSekolah;
            $dataEducation->lokasi_education = $request->lokasi_education[$index];
            $dataEducation->bulan_mulai_education = $request->bulan_mulai_education[$index];
            $dataEducation->tahun_mulai_education = $request->tahun_mulai_education[$index];
            $dataEducation->bulan_selesai_education = $request->bulan_selesai_education[$index];
            $dataEducation->tahun_selesai_education = $request->tahun_selesai_education[$index];
            $dataEducation->jenjang_sekolah = $request->jenjang_sekolah[$index];
            $dataEducation->ipk = $request->ipk[$index];
            $dataEducation->ipk_max = $request->ipk_max[$index];
            $dataEducation->pencapaian = $request->pencapaian[$index];
            $dataEducation->link_sertifikat = $request->link_sertifikat[$index] ?? null;
            $dataEducation->deskripsi_education = $request->deskripsi_education[$index];
            $dataEducation->save();
        }

        return response()->json(['success' => true, 'id' => $dataEducation->personal_id]);
    }

    public function DataExperienceStore(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|array',
            'nama_perusahaan.*' => 'required|string|max:255',
            'jabatan' => 'required|array',
            'jabatan.*' => 'required|string|max:255',
            'lokasi_perusahaan' => 'required|array',
            'lokasi_perusahaan.*' => 'required|string|max:255',
            'deskripsi_perusahaan' => 'nullable|array',
            'deskripsi_perusahaan.*' => 'nullable|string|max:1000',
            'bulan_mulai_experience' => 'required|array',
            'bulan_mulai_experience.*' => 'required',
            'tahun_mulai_experience' => 'required|array',
            'tahun_mulai_experience.*' => 'required',
            'bulan_selesai_experience' => 'nullable|array',
            'bulan_selesai_experience.*' => 'nullable',
            'tahun_selesai_experience' => 'nullable|array',
            'tahun_selesai_experience.*' => 'nullable',
            'portofolio_kerja' => 'nullable',
            'portofolio_kerja.*' => 'nullable',
        ]);

        foreach ($request->nama_perusahaan as $index => $namaPerusahaan) {
            $dataExperience = new DataExperience();
            $dataExperience->personal_id = $request->personal_id;
            $dataExperience->nama_perusahaan = $namaPerusahaan;
            $dataExperience->jabatan = $request->jabatan[$index];
            $dataExperience->lokasi_perusahaan = $request->lokasi_perusahaan[$index];
            $dataExperience->deskripsi_perusahaan = $request->deskripsi_perusahaan[$index];
            $dataExperience->bulan_mulai_experience = $request->bulan_mulai_experience[$index];
            $dataExperience->tahun_mulai_experience = $request->tahun_mulai_experience[$index];
            $dataExperience->bulan_selesai_experience = $request->bulan_selesai_experience[$index];
            $dataExperience->tahun_selesai_experience = $request->tahun_selesai_experience[$index];
            $dataExperience->portofolio_kerja = $request->portofolio_kerja[$index];
            $dataExperience->save();
        }
        return response()->json(['success' => true, 'id' => $dataExperience->personal_id]);
    }

    public function DataExperienceUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|array',
            'nama_perusahaan.*' => 'required|string|max:255',
            'jabatan' => 'required|array',
            'jabatan.*' => 'required|string|max:255',
            'lokasi_perusahaan' => 'required|array',
            'lokasi_perusahaan.*' => 'required|string|max:255',
            'deskripsi_perusahaan' => 'nullable|array',
            'deskripsi_perusahaan.*' => 'nullable|string|max:1000',
            'bulan_mulai_experience' => 'required|array',
            'bulan_mulai_experience.*' => 'required',
            'tahun_mulai_experience' => 'required|array',
            'tahun_mulai_experience.*' => 'required',
            'bulan_selesai_experience' => 'nullable|array',
            'bulan_selesai_experience.*' => 'nullable',
            'tahun_selesai_experience' => 'nullable|array',
            'tahun_selesai_experience.*' => 'nullable',
            'portofolio_kerja' => 'nullable',
            'portofolio_kerja.*' => 'nullable',
        ]);

        foreach ($request->nama_perusahaan as $index => $namaPerusahaan) {
            $dataExperience = DataExperience::findOrFail($id);
            $dataExperience->personal_id = $request->personal_id;
            $dataExperience->nama_perusahaan = $namaPerusahaan;
            $dataExperience->jabatan = $request->jabatan[$index];
            $dataExperience->lokasi_perusahaan = $request->lokasi_perusahaan[$index];
            $dataExperience->deskripsi_perusahaan = $request->deskripsi_perusahaan[$index];
            $dataExperience->bulan_mulai_experience = $request->bulan_mulai_experience[$index];
            $dataExperience->tahun_mulai_experience = $request->tahun_mulai_experience[$index];
            $dataExperience->bulan_selesai_experience = $request->bulan_selesai_experience[$index];
            $dataExperience->tahun_selesai_experience = $request->tahun_selesai_experience[$index];
            $dataExperience->portofolio_kerja = $request->portofolio_kerja[$index];
            $dataExperience->save();
        }
        return response()->json(['success' => true, 'id' => $dataExperience->personal_id]);
    }

    public function DataOrgStore(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|array',
            'nama_organisasi.*' => 'required|string|max:255',
            'posisi' => 'required|array',
            'posisi.*' => 'required|string|max:255',
            'lokasi_organisasi' => 'required|array',
            'lokasi_organisasi.*' => 'required|string|max:255',
            'deskripsi_organisasi' => 'nullable|array',
            'deskripsi_organisasi.*' => 'nullable|string|max:1000',
            'bulan_mulai_organisasi' => 'required|array',
            'bulan_mulai_organisasi.*' => 'required',
            'tahun_mulai_organisasi' => 'required|array',
            'tahun_mulai_organisasi.*' => 'required',
            'bulan_selesai_organisasi' => 'nullable|array',
            'bulan_selesai_organisasi.*' => 'nullable',
            'tahun_selesai_organisasi' => 'nullable|array',
            'tahun_selesai_organisasi.*' => 'nullable',
            'deskripsi_pekerjaan' => 'nullable',
            'deskripsi_pekerjaan.*' => 'nullable',
        ]);

        foreach ($request->nama_organisasi as $index => $namaOrganisasi) {
            $dataOrganization = new DataOrganization();
            $dataOrganization->personal_id = $request->personal_id;
            $dataOrganization->nama_organisasi = $namaOrganisasi;
            $dataOrganization->posisi = $request->posisi[$index];
            $dataOrganization->lokasi_organisasi = $request->lokasi_organisasi[$index];
            $dataOrganization->deskripsi_organisasi = $request->deskripsi_organisasi[$index];
            $dataOrganization->bulan_mulai_organisasi = $request->bulan_mulai_organisasi[$index];
            $dataOrganization->tahun_mulai_organisasi = $request->tahun_mulai_organisasi[$index];
            $dataOrganization->bulan_selesai_organisasi = $request->bulan_selesai_organisasi[$index];
            $dataOrganization->tahun_selesai_organisasi = $request->tahun_selesai_organisasi[$index];
            $dataOrganization->deskripsi_pekerjaan = $request->deskripsi_pekerjaan[$index];
            $dataOrganization->status = $request->status[$index] ?? 'tidak';
            $dataOrganization->save();
        }
        return response()->json(['success' => true]);
    }

    public function DataOrgUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_organisasi' => 'required|array',
            'nama_organisasi.*' => 'required|string|max:255',
            'posisi' => 'required|array',
            'posisi.*' => 'required|string|max:255',
            'lokasi_organisasi' => 'required|array',
            'lokasi_organisasi.*' => 'required|string|max:255',
            'deskripsi_organisasi' => 'nullable|array',
            'deskripsi_organisasi.*' => 'nullable|string|max:1000',
            'bulan_mulai_organisasi' => 'required|array',
            'bulan_mulai_organisasi.*' => 'required',
            'tahun_mulai_organisasi' => 'required|array',
            'tahun_mulai_organisasi.*' => 'required',
            'bulan_selesai_organisasi' => 'nullable|array',
            'bulan_selesai_organisasi.*' => 'nullable',
            'tahun_selesai_organisasi' => 'nullable|array',
            'tahun_selesai_organisasi.*' => 'nullable',
            'deskripsi_pekerjaan' => 'nullable',
            'deskripsi_pekerjaan.*' => 'nullable',
        ]);

        foreach ($request->nama_organisasi as $index => $namaOrganisasi) {
            $dataOrganization = DataOrganization::findOrFail($id);
            $dataOrganization->personal_id = $request->personal_id;
            $dataOrganization->nama_organisasi = $namaOrganisasi;
            $dataOrganization->posisi = $request->posisi[$index];
            $dataOrganization->lokasi_organisasi = $request->lokasi_organisasi[$index];
            $dataOrganization->deskripsi_organisasi = $request->deskripsi_organisasi[$index];
            $dataOrganization->bulan_mulai_organisasi = $request->bulan_mulai_organisasi[$index];
            $dataOrganization->tahun_mulai_organisasi = $request->tahun_mulai_organisasi[$index];
            $dataOrganization->bulan_selesai_organisasi = $request->bulan_selesai_organisasi[$index];
            $dataOrganization->tahun_selesai_organisasi = $request->tahun_selesai_organisasi[$index];
            $dataOrganization->deskripsi_pekerjaan = $request->deskripsi_pekerjaan[$index];
            $dataOrganization->status = $request->status[$index] ?? 'tidak';
            $dataOrganization->save();
        }
        return response()->json(['success' => true]);
    }

    public function generateCV()
    {
        $dataPersonal = DataPersonal::latest()->first();
        $dataExperiences = DataExperience::where('personal_id', $dataPersonal->id ?? 0)->get();
        $dataEducations = DataEducation::where('personal_id', $dataPersonal->id ?? 0)->get();
        $dataOrganization = DataOrganization::where('personal_id', $dataPersonal->id ?? 0)->get();

        // Render HTML dari Blade View
        $html = view('partials.cv', compact('dataPersonal', 'dataExperiences', 'dataEducations', 'dataOrganization'))->render();

        return response()->json([
            'status' => 'success',
            'html'   => $html,
        ]);
    }


}
