<?php

namespace App\Http\Controllers;

use App\Cytology;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteCytology(Patient $patient, Cytology $cytology)
    {
        return redirect()->action('CytologiesController@destroy', [$patient, $cytology]);
    }
}
