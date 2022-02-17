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

    public function getListPaging(Request $request)
    {
        $query = ProductGroup::query();
        
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
        return ProductGroup::find($id);
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