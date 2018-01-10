<?php

namespace App\Http\Controllers;

use App;
use App\Patient;
use Illuminate\Http\Request;
use JavaScript;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('welcome');
    }


    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function calendar()
    {

        /*if($request->session()->has('id')) {
            // session('id') has the current patients id (when we come here through the patient.show page
            $patient = Patient::findOrFail($request->session()->get('id'));
            $request->session()->forget('id');

            // the following is possible due to 'composer require laracasts/utilities'
            // because I want to have access to eloquent through js
            JavaScript::put([
                'patientLastName'  => $patient->last_name,
                'patientFirstName' => $patient->first_name,
                'patientURL'       => '/patients/' . $patient->id
            ]);

        } else {
            JavaScript::put([
                'patientLastName'  => 'Lastname',
                'patientFirstName' => 'FirstName',
                'patientURL'       => '/patients'
            ]);
        }
        //return $patient;*/
        return view('utils.calendar.calendar');
    }
}
