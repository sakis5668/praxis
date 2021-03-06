<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Pregnancy;
use App\PregnancyHistory;
use App\PregnancyOutcome;
use App\PregnancyTerminationType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PregnanciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
    }


    public function index(Patient $patient)
    {
        return view('patients.pregnancies.index', compact('patient'));
    }


    public function create(Patient $patient)
    {
        return view('patients.pregnancies.create', compact('patient'));
    }


    public function store(Request $request, Patient $patient)
    {
        $input = $request->all();
        $input['patient_id'] = $patient->id;
        if ($request['lmp']) {
            $input['lmp'] = Carbon::createFromFormat('d.m.Y', $request['lmp']);
        } else {
            $input['lmp'] = null;
        }
        if ($request['edd']) {
            $input['edd'] = Carbon::createFromFormat('d.m.Y', $request['edd']);
        } else {
            $input['edd'] = null;
        }
        if ($request['corrected_edd']) {
            $input['corrected_edd'] = Carbon::createFromFormat('d.m.Y', $request['corrected_edd']);
        } else {
            $input['corrected_edd'] = null;
        }

        if ($request['finished']) {
            $input['finished'] = true;
        }
        $pregnancy = Pregnancy::create($input);
        if (!$pregnancy->pregnancyHistory) {
            $pregnancyHistory = new PregnancyHistory();
            $pregnancyHistory->pregnancy_id = $pregnancy->id;
            $pregnancyHistory->save();
        }
        if (!$pregnancy->outcome){
            $outcome = new PregnancyOutcome();
            $outcome->pregnancy_id=$pregnancy->id;
            $outcome->save();
        }
        return redirect()->action('PregnanciesController@index', $patient);
    }


    public function show(Patient $patient, Pregnancy $pregnancy)
    {
        return view('patients.pregnancies.show', compact('patient','pregnancy'));
    }


    public function edit(Patient $patient, Pregnancy $pregnancy)
    {
        return view('patients.pregnancies.edit', compact('patient', 'pregnancy'));
    }


    public function update(Request $request, Patient $patient, Pregnancy $pregnancy)
    {
        $input = $request->all();
        if ($request['lmp']) {
            $input['lmp'] = Carbon::createFromFormat('d.m.Y', $request['lmp']);
        }
        if ($request['edd']) {
            $input['edd'] = Carbon::createFromFormat('d.m.Y', $request['edd']);
        }
        if ($request['corrected_edd']) {
            $input['corrected_edd'] = Carbon::createFromFormat('d.m.Y', $request['corrected_edd']);
        }
        if (isset($request['finished'])) {
            $input['finished'] = true;
        } else {
            $input['finished']=false;
        }
        $pregnancy->update($input);
        return redirect()->action('PregnanciesController@index', $patient);
    }


    public function destroy(Patient $patient, Pregnancy $pregnancy)
    {
        $pregnancy->delete();
        return redirect()->action('PregnanciesController@index', $patient);
    }
}
