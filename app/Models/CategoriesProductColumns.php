<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProductColumns extends Model
{
    use HasFactory;

    protected $table = 'categories_product_columns';
    public $timestamps = false;
}
