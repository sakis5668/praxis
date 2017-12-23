<?php

namespace App\Http\Controllers;

use App\Drug;

class UserDrugsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $drugs = Drug::where('name', 'like', '%' . $search . '%')
                ->orWhere('information', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('dosage', 'like', '%' . $search . '%')
                ->paginate(12);
            return view('drugs.index', compact('drugs'));
        }
        $drugs = Drug::paginate(12);
        return view('drugs.index', compact('drugs'));
    }

    public function show(Drug $drug)
    {
        return view('drugs.show', compact('drug'));
    }
}
