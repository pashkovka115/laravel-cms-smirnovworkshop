<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColumns extends General
{
    use HasFactory;

    protected $table = 'products_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(ProductAdditionalFields::class, 'product_id', 'product_id');
    }
}
