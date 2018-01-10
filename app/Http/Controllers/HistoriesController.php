<?php

namespace App\Http\Controllers;

use App\History;
use App\Patient;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    /**
     * HistoriesController constructor.
     */
    public function __construct()
    {
        $this->middleware('is.user');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, History $history)
    {
        return view('patients.history.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, History $history)
    {
        return view('patients.history.edit', compact('patient', 'history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Patient $patient, History $history)
    {
        $history->update($request->all());
        return view('patients.history.show', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, History $history)
    {
        $history->delete();
        return redirect()->route('patients.show', $patient->id);
    }
}
