<?php

namespace App\Http\Controllers;

use App\Pregnancy;
use App\PregnancyExamination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PregnancyExaminationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Pregnancy $pregnancy)
    {
        $examination = $pregnancy->examinations->first();
        if ($examination!=null) {
            return redirect()->action('PregnancyExaminationsController@show', [$pregnancy, $examination]);
        } else {
            return view('patients.pregnancies.examinations.index', compact('pregnancy'));
        }
    }


    public function create(Pregnancy $pregnancy)
    {
        return view('patients.pregnancies.examinations.create', compact('pregnancy'));
    }


    public function store(Request $request, Pregnancy $pregnancy)
    {
        $input = $request->all();
        $input['pregnancy_id']=$pregnancy->id;
        if ($request['date']) {
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        PregnancyExamination::create($input);
        return redirect()->action('PregnancyExaminationsController@index', $pregnancy);
    }


    public function show(Pregnancy $pregnancy,  PregnancyExamination $examination)
    {
        return view('patients.pregnancies.examinations.show', compact('pregnancy', 'examination'));
    }


    public function edit(Pregnancy $pregnancy, PregnancyExamination $examination)
    {
        return view('patients.pregnancies.examinations.edit', compact('pregnancy', 'examination'));
    }


    public function update(Request $request, Pregnancy $pregnancy,  PregnancyExamination $examination)
    {
        $input = $request->all();
        if ($request['date']){
            $input['date'] = Carbon::createFromFormat('d.m.Y', $request['date']);
        }
        $examination->update($input);
        return redirect()->action('PregnancyExaminationsController@show', [$pregnancy, $examination]);
    }


    public function destroy(Pregnancy $pregnancy, PregnancyExamination $examination)
    {
        $examination->delete();
        return redirect()->action('PregnancyExaminationsController@index', $pregnancy);
    }
}
