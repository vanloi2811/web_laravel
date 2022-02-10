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
            'cutomerID' => 'required',
            'productID' => 'required',
            'orderID' => 'required',
        ]);

        return OrdelDetail::create([
            'quantity' => request('quantity'),
            'priceSale' => request('priceSale'),
            'amount' => request('amount'),
            'note' => request('note'),
            'cutomerID' => request('cutomerID'),
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
            'cutomerID' => 'required',
            'productID' => 'required',
            'orderID' => 'required',
        ]);

        $success = $orderdetail->update([
            'quantity' => request('quantity'),
            'priceSale' => request('priceSale'),
            'amount' => request('amount'),
            'note' => request('note'),
            'cutomerID' => request('cutomerID'),
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