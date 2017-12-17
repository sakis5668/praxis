<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Patient;
use Auth;
use PDF;
use Illuminate\Http\Request;

class ExaminationsPDFController extends Controller
{

    /**
     * ExaminationsPDFController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdfOverview(Patient $patient)
    {
        $lang = Auth::user()->language->language;
        $view = "patients.examinations.pdf.overview-pdf-" . $lang;
        try {
            $pdf = PDF::loadView($view, compact('patient'));
            return $pdf->stream('overview-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }

    public function pdfExamination(Patient $patient, Examination $examination)
    {
        $lang = Auth::user()->language->language;
        $view = "patients.examinations.pdf.examination-pdf-" . $lang;
        try {
            $pdf = PDF::loadView($view, compact('patient', 'examination'));
            return $pdf->stream('examination-report.pdf');
        } catch (InvalidArgumentException $exception) {
        }
        return redirect()->back();
    }
}
