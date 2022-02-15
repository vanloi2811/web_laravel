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
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'email.required'=>'Bạn phải nhập email',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'dob.required'=>'Bạn phải nhập ngày sinh',
            'salary.required'=>'Bạn phải nhập lương',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'employeeGroupID.required'=>'Bạn phải nhập mã nhóm nhân viên',
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
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'email.required'=>'Bạn phải nhập email',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'dob.required'=>'Bạn phải nhập ngày sinh',
            'salary.required'=>'Bạn phải nhập lương',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'employeeGroupID.required'=>'Bạn phải nhập mã nhóm nhân viên',
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