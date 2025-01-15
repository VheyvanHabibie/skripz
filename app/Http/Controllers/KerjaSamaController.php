<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KerjaSamaController extends Controller
{
    public function index()
    {
        return view('pages.managemen.kerja-sama.index');
    }
}
