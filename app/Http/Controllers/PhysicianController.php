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
        if (request('search')) {
            $search = request('search');
            $physicians = Patient::where('name', 'like', '%' . $search . '%')->paginate(12);
            return view('admin.physicians.index', compact('physicians'));
        }
        $physicians = Physician::paginate(12);
        return view('admin.physicians.index', compact('physicians'));
    }


    public function create()
    {
        return view('admin.physicians.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $physician = Physician::create($input);
        return redirect()->action('PhysicianController@show', $physician);
    }


    public function show(Physician $physician)
    {
        return view('admin.physicians.show', compact('physician'));
    }


    public function edit(Physician $physician)
    {
        return view('admin.physicians.edit', compact('physician'));
    }


    public function update(Request $request, Physician $physician)
    {
        $input = $request->all();
        $physician->update($input);
        return redirect()->action('PhysicianController@show', $physician);
    }


    public function destroy(Physician $physician)
    {
        $physician->delete();
        return redirect()->action('PhysicianController@index');
    }


}
