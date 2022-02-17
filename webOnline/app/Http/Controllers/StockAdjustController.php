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

    public function getListPaging(Request $request)
    {
        $query = StockAdjust::query();
        
        // for sort
        $sortOrder = $request->input("sortOrder");
        if ($sortOrder == 1) $sortOrder = "DESC";
        else $sortOrder = "ASC";
        $sortColumn = $request->input("sortColumn");
        if ( $sortColumn) {
            $query->orderBy("id", $sortOrder);
        }

        // for paging
        $total = $query->count();
        $pageSize = $request->input("pageSize", 10);
        $pageIndex = $request->input("pageIndex", 1);
        $result = $query->offset(($pageIndex - 1) * $pageSize)->limit($pageSize)->get();

        return [
            "data" => $result,
            "total" => $total,
            "pageIndex" => (int)$pageIndex,
            "pageSize" => (int)$pageSize,
            "lastPage" => ceil($total / $pageSize)
        ];
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
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'note.required'=>'Bạn phải nhập ghi chú',
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
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'note.required'=>'Bạn phải nhập ghi chú',
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