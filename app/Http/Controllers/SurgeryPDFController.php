<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Surgery;
//use Illuminate\Http\Request;
use Auth;
use InvalidArgumentException;
use PDF;

class SurgeryPDFController extends Controller
{
    public function pdf(Patient $patient, Surgery $surgery)
    {
        $lang = Auth::user()->language->language;
        $view = "patients.surgeries.pdf-" . $lang;
        try {
            $pdf = PDF::loadView($view, compact('patient', 'surgery'));
            return $pdf->stream('surgery-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }
}
