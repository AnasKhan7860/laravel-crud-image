<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('employees.index',['employees'=>Employee::orderby('name')->paginate(10)->onEachSide(0),
    ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $request->image->store('employees','public');
        Employee::create($request->validated());
        return to_route('employees.index')->with('success','Employee Created');
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): View
    {
        return view('employees.show',[
            'employee'=>$employee,
    ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        return view('employees.edit',[
            'employee'=>$employee,
    ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request-> validated());
        return to_route('employees.index')->with('success','Employee Updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return to_route('employees.index')->with('success','Employee Deleted');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return to_route('login');
    }
}
