<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.admin');
    }


    public function index()
    {
        return view('admin.home');
    }
}
