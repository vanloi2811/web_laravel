<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportProductGroupByOrder()
    {
        $data = DB::table('product_group')->select('product_group.code', 'product_group.name', 'product.code', 'product.name')
        ->join('product', 'product.productGroupID', '=', 'product_group.id')->get();
        return [
            "data" => $data
        ];
    }
}