<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function calculateBMI()
    {
        return view('utils.bmi.calculate');
    }

    public function calculateWeeks()
    {
        return view('utils.wks.calculate');
    }
}
