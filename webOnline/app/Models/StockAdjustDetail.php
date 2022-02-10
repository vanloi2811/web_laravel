<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustDetail extends Model
{
    use HasFactory;
    protected $table = "stockadjustdetail";

    protected $fillable = [
        'quantity', 'note', 'productID', 'stockAdjustID'
    ];
}