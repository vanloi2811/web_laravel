<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function show($id)
    {
        return Account::find($id);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //         'isActive' => 'required',
    //     ]);

    //     $account = new Account();
    //     $product->username = $request->input('username');
    //     $product->password = $request->input('password');
    //     $product->isActive = $request->input('isActive');
    //     $product->save();
    //     return response()->json($account);
    // }

    public function store()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
            'note' => 'required',
            'isActive' => 'required',
        ],[
            'username.required'=>'Bạn phải nhập tên đăng nhập',
            'password.required'=>'Bạn phải nhập mật khẩu',
            'note.required'=>'Bạn phải nhập ghi chú',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
        ]);

        return Account::create([
            'username' => request('username'),
            'password' => request('password'),
            'note' => request('note'),
            'isActive' => request('isActive'),
        ]);
    }

    public function update(Account $account)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
            'note' => 'required',
            'isActive' => 'required',
        ],[
            'username.required'=>'Bạn phải nhập tên đăng nhập',
            'password.required'=>'Bạn phải nhập mật khẩu',
            'note.required'=>'Bạn phải nhập ghi chú',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
        ]);

        $success = $account->update([
            'username' => request('username'),
            'password' => request('password'),
            'note' => request('note'),
            'isActive' => request('isActive'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Account $account)
    {
        $success = $account->delete();

        return [
            'success' => $success
        ];
    }
}