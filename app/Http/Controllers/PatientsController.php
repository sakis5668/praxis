<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Requests\PatientsRequest;
use App\Patient;
use Carbon\Carbon;
use Session;

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $patients = Patient::where('last_name', 'like', '%' . $search . '%')->
            orWhere('first_name', 'like', '%' . $search . '%')->
            orWhere('middle_name', 'like', '%' . $search . '%')->
            paginate(12);
            return view('patients.index', compact('patients'));
        }
        $patients = Patient::paginate(12);
        return view('patients.index', compact('patients'));
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(PatientsRequest $request)
    {
        $input = $request->all();
        if ($request['birth_date']) {
            $input['birth_date'] =Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        Patient::create($input);
        return redirect('patients');
    }


    /*public function show_old($id)
    {
        $patient = Patient::findOrFail($id);
        if (! $patient->history) {
            $history = new History();
            $history->patient_id = $id;
            $history->save();
        }
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }*/


    public function show(Patient $patient)
    {
        if(!$patient->history){
            $history = new History();
            $history->patient_id = $patient->id;
            $history->save();
        }
        $patient->refresh();
        return view('patients.show', compact('patient'));
    }


   /* public function edit_old($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }*/


    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }


    /*public function update_old(PatientsRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $input = $request->all();
        if ($input['birth_date']) {
            $input['birth_date'] = Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        $patient->update($input);
        return view('patients.show', compact('patient'));
    }*/


    public function update(PatientsRequest $request, Patient $patient)
    {
        $input = $request->all();
        if ($input['birth_date']) {
            $input['birth_date'] = Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        $patient->update($input);
        return view('patients.show', compact('patient'));
    }


    /*public function destroy_old($id)
    {
        $patient = Patient::findOrFail($id);
        if (is_dir($patient->getPatientPath())) {
            $patient->removePatientPath();
        }
        $patient->delete();
        Session::flash('patient_deleted', 'Patient has been deleted');
        return redirect('patients');
    }*/


    public function destroy(Patient $patient)
    {
        if (is_dir($patient->getPatientPath())) {
            $patient->removePatientPath();
        }
        $patient->delete();
        Session::flash('patient_deleted', 'Patient has been deleted');
        return redirect('patients');
    }


}
