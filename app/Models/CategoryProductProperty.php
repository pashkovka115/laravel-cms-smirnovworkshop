<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductProperty extends General //Model
{
    use HasFactory;

    protected $table = 'categories_product_property';
    public $timestamps = false;
//    protected $guarded = ['id'];

    protected $fillable = [
        'category_id',
        'key',
        'type',
        'value',
    ];
}
