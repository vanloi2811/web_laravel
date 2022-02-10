<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjust extends Model
{
    use HasFactory;
    protected $table = "stockadjust";

    protected $fillable = [
        'code', 'note'
    ];
}