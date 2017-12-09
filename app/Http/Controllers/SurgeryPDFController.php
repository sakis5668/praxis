<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Surgery;
use Illuminate\Http\Request;
use PDF;

class SurgeryPDFController extends Controller
{
    public function pdf(Patient $patient, Surgery $surgery)
    {
        $pdf = PDF::loadView('patients.surgeries.pdf', compact('patient', 'surgery'));
        return $pdf->stream('surgery-report.pdf');
    }
}
