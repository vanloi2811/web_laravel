<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function getListPaging(Request $request)
    {
        $query = Product::query();
        
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
        return Product::find($id);
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'barCode' => 'required',
            'priceSale' => 'required',
            'priceBuy' => 'required',
            'inventory' => 'required',
            'minStock' => 'required',
            'maxStock' => 'required',
            'sort' => 'required',
            'isActive' => 'required',
            'note' => 'required',
            'productGroupID' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'barCode.required'=>'Bạn phải nhập mã vạch',
            'priceSale.required'=>'Bạn phải nhập giá giảm',
            'priceBuy.required'=>'Bạn phải nhập giá mua',
            'inventory.required'=>'Bạn phải nhập hàng tổn kho',
            'minStock.required'=>'Bạn phải nhập tồn kho tối thiểu',
            'maxStock.required'=>'Bạn phải nhập tồn kho tối đa',
            'sort.required'=>'Bạn phải nhập loại',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'productGroupID.required'=>'Bạn phải nhập mã nhóm sản phẩm',
        ]);

        return Product::create([
            'code' => request('code'),
            'name' => request('name'),
            'barCode' => request('barCode'),
            'priceSale' => request('priceSale'),
            'priceBuy' => request('priceBuy'),
            'inventory' => request('inventory'),
            'minStock' => request('minStock'),
            'maxStock' => request('maxStock'),
            'sort' => request('sort'),
            'isActive' => request('isActive'),
            'note' => request('note'),
            'productGroupID' => request('productGroupID'),
        ]);
    }

    public function update(Product $product)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
            'barCode' => 'required',
            'priceSale' => 'required',
            'priceBuy' => 'required',
            'inventory' => 'required',
            'minStock' => 'required',
            'maxStock' => 'required',
            'sort' => 'required',
            'isActive' => 'required',
            'note' => 'required',
            'productGroupID' => 'required',
        ],[
            'code.required'=>'Bạn phải nhập mã',
            'name.required'=>'Bạn phải nhập tên',
            'barCode.required'=>'Bạn phải nhập mã vạch',
            'priceSale.required'=>'Bạn phải nhập giá giảm',
            'priceBuy.required'=>'Bạn phải nhập giá mua',
            'inventory.required'=>'Bạn phải nhập hàng tổn kho',
            'minStock.required'=>'Bạn phải nhập tồn kho tối thiểu',
            'maxStock.required'=>'Bạn phải nhập tồn kho tối đa',
            'sort.required'=>'Bạn phải nhập loại',
            'isActive.required'=>'Bạn phải nhập đúng hoặc sai',
            'note.required'=>'Bạn phải nhập ghi chú',
            'productGroupID.required'=>'Bạn phải nhập mã nhóm sản phẩm',
        ]);

        $success = $product->update([
            'code' => request('code'),
            'name' => request('name'),
            'barCode' => request('barCode'),
            'priceSale' => request('priceSale'),
            'priceBuy' => request('priceBuy'),
            'inventory' => request('inventory'),
            'minStock' => request('minStock'),
            'maxStock' => request('maxStock'),
            'sort' => request('sort'),
            'isActive' => request('isActive'),
            'note' => request('note'),
            'productGroupID' => request('productGroupID'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Product $product)
    {
        $success = $product->delete();

        return [
            'success' => $success
        ];
    }

    public function showbyproductgroup($id)
    {
        return Product::all()->where('productGroupID',$id);
    }
}