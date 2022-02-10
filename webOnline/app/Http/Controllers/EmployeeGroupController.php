<?php

namespace App\Http\Controllers;

use App\Models\EmployeeGroup;
use Illuminate\Http\Request;

class EmployeeGroupController extends Controller
{
    public function index()
    {
        return EmployeeGroup::all();
    }

    public function show($id)
    {
        return EmployeeGroup::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'note' => 'required',
        ]);

        return EmployeeGroup::create([
            'code' => request('code'),
            'name' => request('name'),
            'note' => request('note'),
        ]);
    }

    public function update(EmployeeGroup $employeegroup)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'note' => 'required',
        ]);

        $success = $employeegroup->update([
            'code' => request('code'),
            'name' => request('name'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(EmployeeGroup $employeegroup)
    {
        $success = $employeegroup->delete();

        return [
            'success' => $success
        ];
    }
}