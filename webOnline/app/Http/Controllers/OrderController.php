<?php

namespace App\Http\Controllers;

use App\Models\Ordel;
use Illuminate\Http\Request;

class OrdelController extends Controller
{
    public function index()
    {
        return Ordel::all();
    }

    public function show($id)
    {
        return Ordel::find($id);
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

        return Ordel::create([
            'code' => request('code'),
            'totalAmount' => request('totalAmount'),
            'orderStatus' => request('orderStatus'),
            'deliveryStatus' => request('deliveryStatus'),
            'note' => request('note'),
        ]);
    }

    public function update(Ordel $order)
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

    public function destroy(Ordel $order)
    {
        $success = $order->delete();

        return [
            'success' => $success
        ];
    }
}