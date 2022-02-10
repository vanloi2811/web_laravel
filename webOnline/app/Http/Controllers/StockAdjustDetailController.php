<?php

namespace App\Http\Controllers;

use App\Models\StockAdjustDetail;
use Illuminate\Http\Request;

class StockAdjustDetailController extends Controller
{
    public function index()
    {
        return StockAdjustDetail::all();
    }

    public function show($id)
    {
        return StockAdjustDetail::find($id);
    }

    public function store()
    {
        request()->validate([
            'quantity' => 'required',
            'note' => 'required',
            'productID' => 'required',
            'stockAdjustID' => 'required',
        ]);

        return StockAdjustDetail::create([
            'quantity' => request('quantity'),
            'note' => request('note'),
            'productID' => request('productID'),
            'stockAdjustID' => request('stockAdjustID'),
        ]);
    }

    public function update(StockAdjustDetail $stockadjustdetail)
    {
        request()->validate([
            'isView' => 'required',
            'isCreate' => 'required',
            'isUpdate' => 'required',
            'isDelete' => 'required',
            'isExport' => 'required',
            'accountID' => 'required',
            'roleID' => 'required',
        ]);

        $success = $stockadjustdetail->update([
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

    public function destroy(StockAdjustDetail $stockadjustdetail)
    {
        $success = $stockadjustdetail->delete();

        return [
            'success' => $success
        ];
    }
}