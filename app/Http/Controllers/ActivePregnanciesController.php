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
        $pregnancies = Pregnancy::where('finished', false)->paginate(12);
        return view('patients.active_pregnancies.index', compact('pregnancies'));
    }
}
