<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ExportPDF() {
        $pdf = PDF::loadView('report.sidang', [
            'dataoffload' => $dataoffload
        ]);
        return $pdf->stream('Data_Offloading_' . Carbon::now()->format('Ymd_His') . '.pdf');
        }
    public function ExportDataOffloadExcel() {
        $now = Carbon::now();
        $filename = 'Data_Offloading_' . $now->format('Ymd_His') . '.xlsx';
        return Excel::download(new DataOffloadExport, $filename);
    }
}
