<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function show($id)
    {
        return Permission::find($id);
    }

    public function store()
    {
        request()->validate([
            'isView' => 'required',
            'isCreate' => 'required',
            'isUpdate' => 'required',
            'isDelete' => 'required',
            'isExport' => 'required',
            'accountID' => 'required',
            'roleID' => 'required',
        ],[
            'isView.required'=>'Bạn phải đúng hoặc sai',
            'isCreate.required'=>'Bạn phải đúng hoặc sai',
            'isUpdate.required'=>'Bạn phải đúng hoặc sai',
            'isDelete.required'=>'Bạn phải đúng hoặc sai',
            'isExport.required'=>'Bạn phải đúng hoặc sai',
            'accountID.required'=>'Bạn phải nhập mã tài khoản',
            'roleID.required'=>'Bạn phải nhập mã quyền hạn',
        ]);

        return Permission::create([
            'isView' => request('isView'),
            'isCreate' => request('isCreate'),
            'isUpdate' => request('isUpdate'),
            'isDelete' => request('isDelete'),
            'isExport' => request('isExport'),
            'accountID' => request('accountID'),
            'roleID' => request('roleID'),
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'isView' => 'required',
            'isCreate' => 'required',
            'isUpdate' => 'required',
            'isDelete' => 'required',
            'isExport' => 'required',
            'accountID' => 'required',
            'roleID' => 'required',
        ],[
            'isView.required'=>'Bạn phải đúng hoặc sai',
            'isCreate.required'=>'Bạn phải đúng hoặc sai',
            'isUpdate.required'=>'Bạn phải đúng hoặc sai',
            'isDelete.required'=>'Bạn phải đúng hoặc sai',
            'isExport.required'=>'Bạn phải đúng hoặc sai',
            'accountID.required'=>'Bạn phải nhập mã tài khoản',
            'roleID.required'=>'Bạn phải nhập mã quyền hạn',
        ]);

        $success = $permission->update([
            'isView' => request('isView'),
            'isCreate' => request('isCreate'),
            'isUpdate' => request('isUpdate'),
            'isDelete' => request('isDelete'),
            'isExport' => request('isExport'),
            'accountID' => request('accountID'),
            'roleID' => request('roleID'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Permission $permission)
    {
        $success = $permission->delete();

        return [
            'success' => $success
        ];
    }
}