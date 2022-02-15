<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function show($id)
    {
        return Address::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'isDefault' => 'required',
            'note' => 'required',
            'customerID' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'isDefault.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'CustomerID.required'=>'Bạn phải nhập mã khách hàng',
        ]);

        return Address::create([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isDefault' => request('isDefault'),
            'note' => request('note'),
            'customerID' => request('customerID'),
        ]);
    }

    public function update(Address $address)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'isDefault' => 'required',
            'note' => 'required',
            'customerID' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'isDefault.required'=>'Bạn phải đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'CustomerID.required'=>'Bạn phải nhập mã khách hàng',
        ]);

        $success = $address->update([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isDefault' => request('isDefault'),
            'note' => request('note'),
            'customerID' => request('customerID'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Address $address)
    {
        $success = $address->delete();

        return [
            'success' => $success
        ];
    }
}