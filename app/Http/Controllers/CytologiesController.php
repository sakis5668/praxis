<?php

namespace App\Http\Controllers;

use App\Cytology;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CytologiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Patient $patient)
    {
        $cytology = $patient->cytologies()->first();
        return view('patients.cytologies.show', compact('patient', 'cytology'));
    }


    public function create(Patient $patient)
    {
        return view('patients.cytologies.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->getCytologiesPath($patient), $name);
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($input['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request->input('date'));
        }
        $input['filename'] = $name;
        Cytology::create($input);
    }


    public function show(Patient $patient, Cytology $cytology)
    {
        return view('patients.cytologies.show', compact('patient', 'cytology'));
    }


    public function edit(Patient $patient, Cytology $cytology)
    {
        return view('patients.cytologies.edit', compact('patient', 'cytology'));
    }


    public function update(Request $request, Patient $patient, Cytology $cytology)
    {
        $input = $request->all();
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $cytology->update($input);
        return redirect()->action('CytologiesController@show', [$patient, $cytology]);
    }


    public function destroy(Patient $patient, Cytology $cytology)
    {
        unlink($this->getCytologiesPath($patient) . '/' . $cytology->filename);
        $cytology->delete();
        $cytology = $patient->cytologies()->first();
        return redirect()->action('CytologiesController@show', [$patient, $cytology]);
    }


    private function getCytologiesPath(Patient $patient)
    {
        return $patient->getPatientPath() . '/cytologies';
    }
}
