<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;
    protected $table = "productgroup";

    protected $fillable = [
        'code', 'name', 'isActive', 'note'
    ];

    //thử nghiệm khóa ngoại
    public function Product()
    {
        return $this->hasMany(Product::class, "id", "id");
    }
}