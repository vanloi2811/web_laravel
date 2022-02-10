<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function show($id)
    {
        return Employee::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'salary' => 'required',
            'isActive' => 'required',
            'note' => 'required',
            'employeeGroupID' => 'required',
        ]);

        return Employee::create([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
            'dob' => request('dob'),
            'salary' => request('salary'),
            'isActive' => request('isActive'),
            'note' => request('note'),
            'employeeGroupID' => request('employeeGroupID'),
        ]);
    }

    public function update(Employee $employee)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'salary' => 'required',
            'isActive' => 'required',
            'note' => 'required',
            'employeeGroupID' => 'required',
        ]);

        $success = $employee->update([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
            'dob' => request('dob'),
            'salary' => request('salary'),
            'isActive' => request('isActive'),
            'note' => request('note'),
            'employeeGroupID' => request('employeeGroupID'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Employee $employee)
    {
        $success = $employee->delete();

        return [
            'success' => $success
        ];
    }
}