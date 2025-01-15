<?php

namespace App\Http\Controllers\Export;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CVController extends Controller
{
    public function CVPdf() {

        // Buat berkas PDF dengan menggunakan view 'export.berkas' dan kirimkan data
        $pdf = PDF::loadView('export.cv', [
        ]);

        // Kembalikan berkas PDF yang di-stream dengan nama yang sesuai
        return $pdf->stream('Berkas_Export' . Carbon::now()->format('Ymd_His') . '.pdf');
    }
}
