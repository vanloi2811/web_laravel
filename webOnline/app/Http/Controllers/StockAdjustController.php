<?php

namespace App\Http\Controllers;

use App\Models\StockAdjust;
use Illuminate\Http\Request;

class StockAdjustController extends Controller
{
    public function index()
    {
        return StockAdjust::all();
    }

    public function show($id)
    {
        return StockAdjust::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'note' => 'required',
        ]);

        return StockAdjust::create([
            'code-' => request('code'),
            'note' => request('note'),
        ]);
    }

    public function update(StockAdjust $stockadjust)
    {
        request()->validate([
            'code' => 'required',
            'note' => 'required',
        ]);

        $success = $stockadjust->update([
            'code-' => request('code'),
            'note' => request('note'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(StockAdjust $stockadjust)
    {
        $success = $stockadjust->delete();

        return [
            'success' => $success
        ];
    }
}