<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductColumns extends General //Model
{
    use HasFactory;

    protected $table = 'categories_product_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(CategoryProductAdditionalFields::class, 'category_id', 'category_id');
    }
}
