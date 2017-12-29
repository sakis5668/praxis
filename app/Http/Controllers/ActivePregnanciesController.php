<?php

namespace App\Http\Controllers;

use App\Pregnancy;
use Illuminate\Http\Request;

class ActivePregnanciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (request('search')) {
            $pregnancies = Pregnancy::where('finished', false)->with(['patient' => function ($query){
                $query->where('last_name', 'like', '%' . request('search') . '%')->
                orWhere('first_name', 'like', '%' . request('search') . '%')->
                orWhere('middle_name', 'like', '%' . request('search') . '%');
            }])->paginate(12);
            return view('patients.active_pregnancies.index', compact('pregnancies'));
        }
        $pregnancies = Pregnancy::where('finished', false)->orderBy('corrected_edd', 'asc')->paginate(12);
        return view('patients.active_pregnancies.index', compact('pregnancies'));
    }
}
