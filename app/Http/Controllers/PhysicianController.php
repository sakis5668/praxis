<?php

namespace App\Http\Controllers;

use App\Physician;
use Illuminate\Http\Request;

class PhysicianController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.admin');
    }


    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Physician $physician)
    {
        //
    }


    public function edit(Physician $physician)
    {
        //
    }


    public function update(Request $request, Physician $physician)
    {
        //
    }


    public function destroy(Physician $physician)
    {
        //
    }


}
