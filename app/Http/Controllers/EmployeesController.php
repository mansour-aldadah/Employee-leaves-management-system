<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::where('user_id', Auth::id())->get();
        $success = session('success');
        return view('employees.index', [
            'employees' => $employees,
            'success' => $success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $employee = Employee::create($request->all());
        return redirect()->route('employees.index')
            ->with('success', 'Employee created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $leaves = Leave::orderBy('status', 'DESC')->where('employee_id', $employee->id)->get();
        return view('employees.show', [
            'employee' => $employee,
            'leaves' => $leaves
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $employee->update($request->all());
        return redirect(route('employees.index'))
            ->with('success', 'Employee updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employees.index'))
            ->with('success', 'Employee deleted');
    }
}
