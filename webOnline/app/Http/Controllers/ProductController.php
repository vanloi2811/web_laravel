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
}