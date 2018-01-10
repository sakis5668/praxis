<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Surgery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurgeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('is.user');
    }


    public function index(Patient $patient)
    {
        return view('patients.surgeries.index', compact('patient'));
    }


    public function create(Patient $patient)
    {
        return view('patients.surgeries.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        Surgery::create($input);
        return redirect()->action('SurgeriesController@index', $patient);
    }


    public function show(Patient $patient, Surgery $surgery)
    {
        return view('patients.surgeries.show', compact('patient', 'surgery'));
    }


    public function edit(Patient $patient, Surgery $surgery)
    {
        return view('patients.surgeries.edit', compact('patient', 'surgery'));
    }


    public function update(Request $request, Patient $patient, Surgery $surgery)
    {
        $input=$request->all();
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $surgery->update($input);
        return redirect()->action('SurgeriesController@show', [$patient, $surgery]);
    }


    public function destroy(Patient $patient, Surgery $surgery)
    {
        $surgery->delete();
        return redirect()->action('SurgeriesController@index', $patient);
    }

}
