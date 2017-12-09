<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class SSWCalculatorController extends Controller
{

    /**
     * SSWCalculatorController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inputData()
    {
        return view('utils.ssw.input');
    }

    public function calculateResult(Request $request)
    {
        $lmp = \request('lp');
        $edd = \request('et');

        if (isset($lmp)) {
            $lmpDate = Carbon::createFromFormat('d.m.Y', $lmp)->format('d.m.Y');
        } else {
            $lmpDate = '';
        }

        if (isset($edd)) {
            $eddDate = $edd;
        } else {
            if (isset($lmp)) {
                $eddDate = Carbon::createFromFormat('d.m.Y', $lmp)->addDays(280)->format('d.m.Y');
            } else {
                $eddDate = '';
            }
        }

        $days=0;
        if (strlen($eddDate)>0) {
            $dtToday = Carbon::now();
            $dtEDD = Carbon::createFromFormat('d.m.Y', $eddDate);
            $days = $dtToday->diffInDays($dtEDD);
            if ($dtToday->lt($dtEDD)) {
                $days = 280 - $days;
            } else {
                $days = 280 + $days;
            }
        }
        $dString = CarbonInterval::days($days);

        return view('utils.ssw.results', compact('lmpDate', 'eddDate', 'dString'));
    }
}
