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

    public function getListPaging(Request $request)
    {
        $query = Address::query();
        
        // for sort
        $sortOrder = $request->input("sortOrder");
        if ($sortOrder == 1) $sortOrder = "DESC";
        else $sortOrder = "ASC";
        $sortColumn = $request->input("sortColumn");
        if ( $sortColumn) {
            $query->orderBy("id", $sortOrder);
        }

        // for paging
        $total = $query->count();
        $pageSize = $request->input("pageSize", 10);
        $pageIndex = $request->input("pageIndex", 1);
        $result = $query->offset(($pageIndex - 1) * $pageSize)->limit($pageSize)->get();

        return [
            "data" => $result,
            "total" => $total,
            "pageIndex" => (int)$pageIndex,
            "pageSize" => (int)$pageSize,
            "lastPage" => ceil($total / $pageSize)
        ];
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
            // 'note' => 'required',
            'customerId' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'isDefault.required'=>'Bạn phải nhập đúng hoặc sai',
            // 'note.required'=>'Bạn phải nhập ghi chú',
            'customerId.required'=>'Bạn phải nhập mã khách hàng',
        ]);

        return Address::create([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isDefault' => request('isDefault'),
            'note' => request('note'),
            'customerId' => request('customerId'),
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
            // 'note' => 'required',
            'customerId' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'address.required'=>'Bạn phải nhập địa chỉ',
            'isDefault.required'=>'Bạn phải đúng hoặc sai',
            // 'note.required'=>'Bạn phải nhập ghi chú',
            'CustomerID.required'=>'Bạn phải nhập mã khách hàng',
        ]);

        $success = $address->update([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isDefault' => request('isDefault'),
            'note' => request('note'),
            'customerId' => request('customerId'),
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