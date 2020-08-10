<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees =  Employee::paginate(15);

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    public function store(EmployeeStoreRequest $storeRequest): RedirectResponse
    {
        $newEmployee = Employee::create($storeRequest->validated());

        return redirect()->route('employees.index')
            ->with(['message' => $newEmployee->name . ' was successfully created!']);
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        $companies = Company::all();

        return view('employees.edit', compact(['employee', 'companies']));
    }

    public function update(EmployeeStoreRequest $storeRequest, Employee $employee): RedirectResponse
    {
        $data = $storeRequest->validated();
        $data['phone'] = $storeRequest->get('phone');

        $employee->update($data);

        return redirect()->route('employees.index')
            ->with(['message' => $employee->name . ' was successfully edited.']);
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->forceDelete();

        return redirect()->route('employees.index')
            ->with(['message' => $employee->name . ' was successfully deleted.']);
    }
}
