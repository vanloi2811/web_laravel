<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'totalAmount' => 'required',
            'orderStatus' => 'required',
            'deliveryStatus' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'totalAmount.required'=>'Bạn phải nhập tổng cộng',
            'orderStatus.required'=>'Bạn phải nhập tình trạng đặt hàng',
            'deliveryStatus.required'=>'Bạn phải nhập tình trạng giao hàng',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        return Order::create([
            'code' => request('code'),
            'totalAmount' => request('totalAmount'),
            'orderStatus' => request('orderStatus'),
            'deliveryStatus' => request('deliveryStatus'),
            'note' => request('note'),
        ]);
    }

    public function update(Order $order)
    {
        request()->validate([
            'code' => 'required',
            'totalAmount' => 'required',
            'orderStatus' => 'required',
            'deliveryStatus' => 'required',
            'note' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'totalAmount.required'=>'Bạn phải nhập tổng cộng',
            'orderStatus.required'=>'Bạn phải nhập tình trạng đặt hàng',
            'deliveryStatus.required'=>'Bạn phải nhập tình trạng giao hàng',
            'note.required'=>'Bạn phải nhập ghi chú',
        ]);

        $success = $order->update([
            'code' => request('code'),
            'totalAmount' => request('totalAmount'),
            'orderStatus' => request('orderStatus'),
            'deliveryStatus' => request('deliveryStatus'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Order $order)
    {
        $success = $order->delete();

        return [
            'success' => $success
        ];
    }
}