<?php

namespace App\Http\Controllers;

use App\Pregnancy;
use App\PregnancyOutcome;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PregnancyOutcomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Pregnancy $pregnancy, PregnancyOutcome $outcome)
    {
        return view('patients.pregnancies.outcome.show', compact('pregnancy', 'outcome'));
    }


    public function edit(Pregnancy $pregnancy, PregnancyOutcome $outcome)
    {
        return view('patients.pregnancies.outcome.edit', compact('pregnancy', 'outcome'));
    }


    public function update(Request $request, Pregnancy $pregnancy, PregnancyOutcome $outcome)
    {
        $input = $request->all();
        $input['pregnancy_id'] = $pregnancy->id;
        if ($request['date']){
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $outcome->update($input);
        return redirect()->action('PregnancyOutcomesController@show', [$pregnancy, $outcome]);
    }

}
