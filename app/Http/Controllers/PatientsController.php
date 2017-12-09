<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Requests\PatientsRequest;
use App\Patient;
use Carbon\Carbon;
use Session;

//use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * PatientsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientsRequest $request)
    {
        $input = $request->all();
        if ($request['birth_date']) {
            $input['birth_date'] =Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        Patient::create($input);
        return redirect('patients');
    }

    /**
     * Display the specified resource
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        if (! $patient->history) {
            $history = new History();
            $history->patient_id = $id;
            $history->save();
        }
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientsRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $input = $request->all();
        if ($input['birth_date']) {
            $input['birth_date'] = Carbon::createFromFormat('d.m.Y', $request['birth_date']);
        }
        $patient->update($input);
        return view('patients.show', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        if (is_dir($patient->getPatientPath())) {
            $patient->removePatientPath();
        }


        $patient->delete();
        Session::flash('patient_deleted', 'Patient has been deleted');
        return redirect('patients');
    }
}
