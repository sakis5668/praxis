<?php

namespace App\Http\Controllers;

use App\Cytology;
use App\Histology;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistologiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
    }


    public function index(Patient $patient)
    {
        $histology = $patient->histologies()->first();
        return view('patients.histologies.show', compact('patient', 'histology'));
    }


    public function create(Patient $patient)
    {
        return view('patients.histologies.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->getHistologiesPath($patient), $name);
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($input['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request->input('date'));
        }
        $input['filename'] = $name;
        Histology::create($input);
    }


    public function show(Patient $patient, Histology $histology)
    {
        return view('patients.histologies.show', compact('patient', 'histology'));
    }


    public function edit(Patient $patient, Histology $histology)
    {
        return view('patients.histologies.edit', compact('patient', 'histology'));
    }


    public function update(Request $request, Patient $patient, Histology $histology)
    {
        $input = $request->all();
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $histology->update($input);
        return redirect()->action('HistologiesController@show', [$patient, $histology]);
    }

    public function destroy(Patient $patient, Histology $histology)
    {
        unlink($this->getHistologiesPath($patient) . '/' . $histology->filename);
        $histology->delete();
        $histology = $patient->histologies()->first();
        return redirect()->action('HistologiesController@show', [$patient, $histology]);
    }


    private function getHistologiesPath(Patient $patient)
    {
        return $patient->getPatientPath() . '/histologies';
    }
}
