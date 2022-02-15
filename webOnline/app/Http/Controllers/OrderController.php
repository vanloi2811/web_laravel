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

    public function showtop10()
    {
        // return Order::all()->take(10)->orderBy('totalAmount','DESC');
        // return Order::orderBy('totalAmount','DESC')->limit(10);
        // return Order::all()->limit(10);
        return Order::all()->take(10);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'totalAmount' => 'required',
            'orderStatus' => 'required',
            'deliveryStatus' => 'required',
            'note' => 'required',
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