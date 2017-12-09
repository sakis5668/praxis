<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ExaminationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Patient $patient)
    {
        return view('patients.examinations.index', compact( 'patient'));
    }


    public function create(Patient $patient)
    {
        return view('patients.examinations.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $input = $request->all();
        $input['patient_id']=$patient->id;
        if ($request['date']) {
            $input['date'] =Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        Examination::create($input);
        return redirect()->action('ExaminationsController@index', $patient);
    }


    public function show(Patient $patient, Examination $examination)
    {
        return view('patients.examinations.show', compact('patient', 'examination'));
    }


    public function edit(Patient $patient, Examination $examination)
    {
        return view('patients.examinations.edit', compact('examination', 'patient'));
    }


    public function update(Request $request, Patient $patient, Examination $examination)
    {
        $input = $request->all();
        $examination->update($input);
        return redirect()->action('ExaminationsController@show', [$patient, $examination]);
    }


    public function destroy(Patient $patient, Examination $examination)
    {
        $examination->delete();
        return redirect()->action('ExaminationsController@index', $patient);
    }
}
