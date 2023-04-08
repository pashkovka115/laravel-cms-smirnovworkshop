<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalFields extends Model
{
    use HasFactory;

    protected $table = 'product_additional_fields';
    public $timestamps = false;
}
