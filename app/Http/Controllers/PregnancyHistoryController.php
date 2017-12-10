<?php

namespace App\Http\Controllers;

use App\Pregnancy;
use App\PregnancyHistory;
use Illuminate\Http\Request;

class PregnancyHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Pregnancy $pregnancy,  PregnancyHistory $history)
    {
        $patient = $pregnancy->patient;
        return view('patients.pregnancies.history.show', compact('pregnancy', 'history', 'patient'));
    }


    public function edit(Pregnancy $pregnancy,  PregnancyHistory $history)
    {
        $patient = $pregnancy->patient;
        return view('patients.pregnancies.history.edit', compact('pregnancy', 'history', 'patient'));
    }


    public function update(Request $request, Pregnancy $pregnancy, PregnancyHistory $history)
    {
        $input = $request->all();
        $input['pregnancy_id'] = $pregnancy->id;
        $history->update($input);
        return redirect()->action('PregnancyHistoryController@show', [$pregnancy, $history]);
    }


    public function destroy(PregnancyHistory $history)
    {
        //
    }
}
