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

    public function getListPaging(Request $request)
    {
        $query = Customer::query();
        
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
        return Customer::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            // 'dob' => 'required',
            // 'password' => 'required',
            'isActive' => 'required', //quyền hoạt động
            // 'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'email.required'=>'Bạn phải nhập email',
            // 'dob.required'=>'Bạn phải nhập ngày sinh',
            // 'password.required'=>'Bạn phải nhập mật khẩu',
            'isActive.required'=>'Bạn phải đúng hoặc sai',
            // 'note.required'=>'Bạn phải nhập ghi chú',
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
            // 'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'phone.required'=>'Bạn phải nhập số điện thoại',
            'email.required'=>'Bạn phải nhập email',
            'dob.required'=>'Bạn phải nhập ngày sinh',
            'password.required'=>'Bạn phải nhập mật khẩu',
            'isActive.required'=>'Bạn phải đúng hoặc sai',
            // 'note.required'=>'Bạn phải nhập ghi chú',
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