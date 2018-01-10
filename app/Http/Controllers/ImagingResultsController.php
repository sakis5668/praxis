<?php

namespace App\Http\Controllers;

use App\ImagingResult;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImagingResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
    }


    public function index(Patient $patient)
    {
        $imagingResult = $patient->imagingResults()->first();
        return view('patients.imaging_results.show', compact('patient', 'imagingResult'));
    }


    public function create(Patient $patient)
    {
        return view('patients.imaging_results.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->getImagingResultsPath($patient), $name);
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($input['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request->input('date'));
        }
        $input['filename'] = $name;
        ImagingResult::create($input);
    }


    public function show(Patient $patient, ImagingResult $imagingResult)
    {
        return view('patients.imaging_results.show', compact('patient', 'imagingResult'));
    }


    public function edit(Patient $patient, ImagingResult $imagingResult)
    {
        return view('patients.imaging_results.edit', compact('patient', 'imagingResult'));
    }


    public function update(Request $request, Patient $patient, ImagingResult $imagingResult)
    {
        $input = $request->all();
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $imagingResult->update($input);
        return redirect()->action('ImagingResultsController@show', [$patient, $imagingResult]);
    }


    public function destroy(Patient $patient, ImagingResult $imagingResult)
    {
        unlink($this->getImagingResultsPath($patient) . '/' . $imagingResult->filename);
        $imagingResult->delete();
        $imagingResult = $patient->imagingResults()->first();
        return redirect()->action('ImagingResultsController@show', [$patient, $imagingResult]);
    }


    private function getImagingResultsPath(Patient $patient)
    {
        return $patient->getPatientPath() . '/imaging_results';
    }
}
