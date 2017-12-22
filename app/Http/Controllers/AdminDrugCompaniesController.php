<?php

namespace App\Http\Controllers;

use App\DrugCompany;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

class AdminDrugCompaniesController extends Controller
{

    public function __construct()
    {
        $this->middleware('is.admin');
    }

    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $drugCompanies = DrugCompany::where('name', 'like', '%' . $search . '%')->paginate(12);
            return view('admin.drugs.companies.index', compact('drugCompanies'));
        }
        $drugCompanies = DrugCompany::paginate(12);
        return view('admin.drugs.companies.index', compact('drugCompanies'));
    }


    public function create()
    {
        return view('admin.drugs.companies.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/docs/logos', $name);
            $input['logo'] = $name;
        }
//        $input = $request->all();


        $drugCompany = DrugCompany::create($input);
        return redirect()->action('AdminDrugCompaniesController@show', $drugCompany);
    }


    public function show(DrugCompany $drugCompany)
    {
        return view('admin.drugs.companies.show', compact('drugCompany'));
    }


    public function edit(DrugCompany $drugCompany)
    {
        return view('admin.drugs.companies.edit', compact('drugCompany'));
    }


    public function update(Request $request, DrugCompany $drugCompany)
    {
        $input = $request->all();
        $drugCompany->update($input);
        return redirect()->action('AdminDrugCompaniesController@show', $drugCompany);
    }


    public function destroy(DrugCompany $drugCompany)
    {
        unlink(public_path() . '/docs/logos/' . $drugCompany->logo);
        $drugCompany->delete();
        return redirect()->action('AdminDrugCompaniesController@index');
    }


}
