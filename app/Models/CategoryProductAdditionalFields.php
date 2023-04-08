<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductAdditionalFields extends General //Model
{
    use HasFactory;

    protected $table = 'categories_product_additional_fields';
    public $timestamps = false;
//    protected $guarded = ['id'];

    protected $fillable = [
        'category_id',
        'key',
        'type',
        'value',
    ];
}
