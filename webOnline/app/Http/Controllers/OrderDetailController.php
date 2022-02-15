<?php

namespace App\Http\Controllers;

use App\Models\OrdelDetail;
use Illuminate\Http\Request;

class OrdelDetailController extends Controller
{
    public function index()
    {
        return OrdelDetail::all();
    }

    public function show($id)
    {
        return OrdelDetail::find($id);
    }

    public function store()
    {
        request()->validate([
            'quantity' => 'required',
            'priceSale' => 'required',
            'amount' => 'required',
            'note' => 'required',
            'customerID' => 'required',
            'productID' => 'required',
            'orderID' => 'required',
        ],[
            'quantity.required'=>'Bạn phải nhập số lượng',
            'priceSale.required'=>'Bạn phải nhập giảm giá',
            'amount.required'=>'Bạn phải nhập số lượng',
            'note.required'=>'Bạn phải nhập ghi chú',
            'customerID.required'=>'Bạn phải nhập mã khách hàng',
            'productID.required'=>'Bạn phải nhập mã sản phẩm',
            'orderID.required'=>'Bạn phải nhập mã đặt hàng',
        ]);

        return OrdelDetail::create([
            'quantity' => request('quantity'),
            'priceSale' => request('priceSale'),
            'amount' => request('amount'),
            'note' => request('note'),
            'customerID' => request('cutomerID'),
            'productID' => request('productID'),
            'orderID' => request('orderID'),
        ]);
    }

    public function update(OrdelDetail $orderdetail)
    {
        request()->validate([
            'quantity' => 'required',
            'priceSale' => 'required',
            'amount' => 'required',
            'note' => 'required',
            'customerID' => 'required',
            'productID' => 'required',
            'orderID' => 'required',
        ],[
            'quantity.required'=>'Bạn phải nhập số lượng',
            'priceSale.required'=>'Bạn phải nhập giảm giá',
            'amount.required'=>'Bạn phải nhập số lượng',
            'note.required'=>'Bạn phải nhập ghi chú',
            'customerID.required'=>'Bạn phải nhập mã khách hàng',
            'productID.required'=>'Bạn phải nhập mã sản phẩm',
            'orderID.required'=>'Bạn phải nhập mã đặt hàng',
        ]);

        $success = $orderdetail->update([
            'quantity' => request('quantity'),
            'priceSale' => request('priceSale'),
            'amount' => request('amount'),
            'note' => request('note'),
            'customerID' => request('cutomerID'),
            'productID' => request('productID'),
            'orderID' => request('orderID'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(OrdelDetail $orderdetail)
    {
        $success = $orderdetail->delete();

        return [
            'success' => $success
        ];
    }
}