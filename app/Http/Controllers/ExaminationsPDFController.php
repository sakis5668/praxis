<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Patient;
use Auth;
use PDF;
use Illuminate\Http\Request;

class ExaminationsPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
    }

    public function pdfOverview(Patient $patient)
    {
        $view = "patients.examinations.pdf.overview-pdf";
        try {
            $pdf = PDF::loadView($view, compact('patient'));
            return $pdf->stream('overview-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }

    public function pdfExamination(Patient $patient, Examination $examination)
    {
        $view = "patients.examinations.pdf.examination-pdf";
        try {
            $pdf = PDF::loadView($view, compact('patient', 'examination'));
            return $pdf->stream('examination-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }
}
