<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies =  Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $storeRequest): RedirectResponse
    {
        $newCompany = Company::create($storeRequest->validated());

        return redirect()->route('companies.index')
            ->with(['message' => $newCompany->name . ' was successfully created!']);
    }

    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyStoreRequest $storeRequest, Company $company): RedirectResponse
    {
        $data = $storeRequest->validated();

        if ($file = $storeRequest->file('logo')) {
            $data['logo'] = $file->store('public');
        }

        $company->update($data);

        return redirect()->route('companies.index')
            ->with(['message' => $company->name . ' was successfully edited.']);
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->forceDelete();

        return redirect()->route('companies.index')
            ->with(['message' => $company->name . ' was successfully deleted.']);
    }
}
