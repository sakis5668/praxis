<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Requests\PatientsRequest;
use App\Patient;
use App\Physician;
use Carbon\Carbon;
use Session;

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
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
        $physicians = Physician::pluck('name', 'id')->all();
        return view('patients.create', compact('physicians'));
    }


    public function store(PatientsRequest $request)
    {
        $input = $request->all();
        if ($request['birth_date']) {
            $input['birth_date'] =Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        $patient = Patient::create($input);
        return redirect()->action('PatientsController@show', $patient);
    }


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


    public function edit(Patient $patient)
    {
        $physicians = Physician::pluck('name', 'id')->all();
        return view('patients.edit', compact('patient', 'physicians'));
    }


    public function update(PatientsRequest $request, Patient $patient)
    {
        $input = $request->all();
        if ($input['birth_date']) {
            $input['birth_date'] = Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        $patient->update($input);
        return redirect()->action('PatientsController@show', $patient);
    }


    public function destroy(Patient $patient)
    {
        if (is_dir($patient->getPatientPath())) {
            $patient->removePatientPath();
        }
        $patient->delete();
        Session::flash('patient_deleted', 'Patient has been deleted');
        return redirect()->action('PatientsController@index');
    }


}
