<?php

namespace App\Http\Controllers;

use App\LaboratoryExamination;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaboratoryExaminationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Patient $patient)
    {
        $laboratoryExamination = $patient->laboratoryExaminations()->first();
        return view('patients.laboratory_examinations.show', compact('patient', 'laboratoryExamination'));
    }


    public function create(Patient $patient)
    {
        return view('patients.laboratory_examinations.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->getLaboratoryExaminationsPath($patient), $name);
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($input['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request->input('date'));
        }
        $input['filename'] = $name;
        LaboratoryExamination::create($input);
    }


    public function show(Patient $patient, LaboratoryExamination $laboratoryExamination)
    {
        return view('patients.laboratory_examinations.show', compact('patient', 'laboratoryExamination'));
    }


    public function edit(Patient $patient, LaboratoryExamination $laboratoryExamination)
    {
        return view('patients.laboratory_examinations.edit', compact('patient', 'laboratoryExamination'));
    }


    public function update(Request $request, Patient $patient, LaboratoryExamination $laboratoryExamination)
    {
        $input = $request->all();
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $laboratoryExamination->update($input);
        return redirect()->action('LaboratoryExaminationsController@show', [$patient, $laboratoryExamination]);
    }

    public function destroy(Patient $patient, LaboratoryExamination $laboratoryExamination)
    {
        unlink($this->getLaboratoryExaminationsPath($patient) . '/' . $laboratoryExamination->filename);
        $laboratoryExamination->delete();
        $laboratoryExamination = $patient->laboratoryExaminations()->first();
        return redirect()->action('LaboratoryExaminationsController@show', [$patient, $laboratoryExamination]);
    }


    private function getLaboratoryExaminationsPath(Patient $patient)
    {
        return $patient->getPatientPath() . '/laboratory_examinations';
    }
}
