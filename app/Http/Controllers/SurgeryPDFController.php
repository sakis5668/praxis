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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf(Patient $patient, Surgery $surgery)
    {
        $view = "patients.surgeries.pdf";
        try {
            $pdf = PDF::loadView($view, compact('patient', 'surgery'));
            return $pdf->stream('surgery-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }
}
