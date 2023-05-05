<?php

namespace App\Models\Product;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsDescription extends Model
{
    use HasFactory;

    protected $table = 'products_description';
    protected $guarded = ['id'];


    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
