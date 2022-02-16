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

    public function getListPaging(Request $request)
    {
        $query = Order::query();
        
        // for sort
        $sortOrder = $request->input("sortOrder");
        if ($sortOrder == 1) $sortOrder = "DESC";
        else $sortOrder = "ASC";
        $sortColumn = $request->input("sortColumn");
        if ( $sortColumn) {
            $query->orderBy("id", $sortOrder);
        }

        // for paging
        $pageSize = $request->input("pageSize", 10);
        $pageIndex = $request->input("pageIndex", 1);
        $result = $query->offset(($pageIndex - 1) * $pageSize)->limit($pageSize)->get();
        $total = $query->count();

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