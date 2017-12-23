<?php

namespace App\Http\Controllers;

use App\Drug;
use App\DrugCompany;
use Illuminate\Http\Request;

class AdminDrugsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.admin');
    }


    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $drugs = Drug::where('name', 'like', '%' . $search . '%')->paginate(12);
            return view('admin.drugs.drugs.index', compact('drugs'));
        }
        $drugs = Drug::paginate(12);
        return view('admin.drugs.drugs.index', compact('drugs'));
    }


    public function create()
    {
        $companies = DrugCompany::pluck('name', 'id')->all();
        return view('admin.drugs.drugs.create', compact('companies'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->file('filename')) {
            $file = $request->file('filename');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/docs/images/drugs', $name);
            $input['filename'] = $name;
        }
        $drug = Drug::create($input);
        return redirect()->action('AdminDrugsController@show', $drug);
    }


    public function show(Drug $drug)
    {
        return view('admin.drugs.drugs.show', compact('drug'));
    }


    public function edit(Drug $drug)
    {
        $companies = DrugCompany::pluck('name', 'id')->all();
        return view('admin.drugs.drugs.edit', compact('drug', 'companies'));
    }


    public function update(Request $request, Drug $drug)
    {
        $input = $request->all();
        $drug->update($input);
        return redirect()->action('AdminDrugsController@show', $drug);
    }


    public function destroy(Drug $drug)
    {
        if ($drug->filename) {
            unlink(public_path() . '/docs/images/drugs/' . $drug->filename);
        }
        $drug->delete();
        return redirect()->action('AdminDrugsController@index');
    }


}
