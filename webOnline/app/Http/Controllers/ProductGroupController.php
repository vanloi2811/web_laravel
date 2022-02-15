<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    public function index()
    {
        return ProductGroup::all();
    }

    public function show($id)
    {
        return CusProductGrouptomer::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'isActive' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        return ProductGroup::create([
            'code' => request('code'),
            'name' => request('name'),
            'isActive' => request('isActive'),
            'note' => request('note'),
        ]);
    }

    public function update(ProductGroup $productgroup)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'isActive' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        $success = $productgroup->update([
            'code' => request('code'),
            'name' => request('name'),
            'isActive' => request('isActive'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(ProductGroup $productgroup)
    {
        $success = $productgroup->delete();

        return [
            'success' => $success
        ];
    }
}