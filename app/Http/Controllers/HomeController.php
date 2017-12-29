<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

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
}
