<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    use HasFactory;
    protected $table = "employeegroup";

    protected $fillable = [
        'code', 'name', 'note'
    ];
}