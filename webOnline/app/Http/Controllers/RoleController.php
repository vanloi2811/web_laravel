<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'note' => 'required',
        ],[
            'name.required'=>'Bạn phải nhập tên',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        return Role::create([
            'name' => request('name'),
            'note' => request('note'),
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required',
            'note' => 'required',
        ],[
            'name.required'=>'Bạn phải nhập tên',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        $success = $role->update([
            'name' => request('name'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Role $role)
    {
        $success = $role->delete();

        return [
            'success' => $success
        ];
    }
}