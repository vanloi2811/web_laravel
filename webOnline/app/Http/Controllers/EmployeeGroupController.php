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

    public function getlistpaging(Request $request)
    {
        $query = EmployeeGroup::query();
        
        // for sort
        $sortOrder = $request->input("sortOrder");
        if ($sortOrder == 1) $sortOrder = "DESC";
        else $sortOrder = "ASC";
        $sortColumn = $request->input("sortColumn");
        if ( $sortColumn) {
            $query->orderBy("id", $sortOrder);
        }

        // for paging
        $pageSize = $request->input("pageSize", 10);
        $pageIndex = $request->input("pageIndex", 1);
        $result = $query->offset(($pageIndex - 1) * $pageSize)->limit($pageSize)->get();
        $total = $query->count();

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
        return EmployeeGroup::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'note.required'=>'Bạn phải nhập ghi chú',
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
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'note.required'=>'Bạn phải nhập ghi chú',
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