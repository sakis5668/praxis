<?php

namespace App\Http\Controllers;

use App\Pregnancy;
use App\PregnancyPrenatal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PregnancyPrenatalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.user');
    }

    public function index(Pregnancy $pregnancy)
    {
        $prenatal = $pregnancy->prenatals->first();
        $patient = $pregnancy->patient;
        if ($prenatal!=null) {
            return redirect()->action('PregnancyPrenatalsController@show', [$pregnancy, $prenatal]);
        } else {
            return view('patients.pregnancies.prenatals.index', compact('pregnancy', 'patient'));
        }
    }


    public function create(Pregnancy $pregnancy)
    {
        $patient = $pregnancy->patient;
        return view('patients.pregnancies.prenatals.create', compact('pregnancy', 'patient'));
    }


    public function store(Request $request, Pregnancy $pregnancy)
    {
        $input = $request->all();
        $input['pregnancy_id'] = $pregnancy->id;
        if ($request['date']){
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        PregnancyPrenatal::create($input);
        return redirect()->action('PregnancyPrenatalsController@index', $pregnancy);
    }


    public function show(Pregnancy $pregnancy, PregnancyPrenatal $prenatal)
    {
        $patient = $pregnancy->patient;
        return view('patients.pregnancies.prenatals.show', compact('pregnancy', 'prenatal', 'patient'));
    }


    public function edit(Pregnancy $pregnancy, PregnancyPrenatal $prenatal)
    {
        $patient = $pregnancy->patient;
        return view('patients.pregnancies.prenatals.edit', compact('pregnancy', 'prenatal', 'patient'));
    }


    public function update(Request $request, Pregnancy $pregnancy, PregnancyPrenatal $prenatal)
    {
        $input = $request->all();
        if ($request['date']){
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $prenatal->update($input);
        return redirect()->action('PregnancyPrenatalsController@show', [$pregnancy, $prenatal]);
    }


    public function destroy(Pregnancy $pregnancy, PregnancyPrenatal $prenatal)
    {
        $prenatal->delete();
        return redirect()->action('PregnancyPrenatalsController@index', $pregnancy);
    }
}
