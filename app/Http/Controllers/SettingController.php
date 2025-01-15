<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $about = About::first();
        return view('setting', compact('setting', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update(
            $request->only('nama_perguruan_tinggi', 'nama_aplikasi', 'deskripsi', 'versi','tahun', 'copyright', 'alamat', 'no_telepon', 'email', 'url_instagram', 'url_linkedin', 'url_youtube')
        );

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'LOGO_'.strtoupper(Str::random(5)) . '-' . rand() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('logo/'), 'logo/' . $fileName);

            $setting->update([
                'logo' => 'logo/'.$fileName
            ]);
        }
        return back()->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
