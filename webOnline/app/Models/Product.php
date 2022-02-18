<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";

    protected $fillable = [
        'code', 'name', 'barCode', 'priceSale', 'priceBuy', 'inventory', 'minStock', 'maxStock', 'sort', 'isActive', 'note', 'image', 'productGroupId'
    ];

    //thử nghiệm khóa ngoại
    public function ProductGroup()
    {
        return $this->belongsTo(ProductGroup::class, "productGroupId", "id");
    }
}