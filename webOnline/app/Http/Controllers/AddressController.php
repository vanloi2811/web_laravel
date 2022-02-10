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