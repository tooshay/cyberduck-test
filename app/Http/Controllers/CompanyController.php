<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $storeRequest)
    {
        Company::create($storeRequest->validated());

        return redirect()->route('companies.index');
    }

    public function show($id)
    {

    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
