<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show($id)
    {
        return Customer::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'isActive' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
        ]);

        return Customer::create([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'dob' => request('dob'),
            'password' => request('password'),
            'isActive' => request('isActive'),
            'note' => request('note'),
        ]);
    }

    public function update(Customer $customer)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'isActive' => 'required',
            'note' => 'required',
        ]);

        $success = $customer->update([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'dob' => request('dob'),
            'password' => request('password'),
            'isActive' => request('isActive'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Customer $customer)
    {
        $success = $customer->delete();

        return [
            'success' => $success
        ];
    }
}