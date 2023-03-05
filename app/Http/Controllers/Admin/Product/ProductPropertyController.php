<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\ProductProperty;
use Illuminate\Http\Request;

class ProductPropertyController extends AdminController
{
    const FOREIGN_FIELD = 'product_id';
    const MODEL = ProductProperty::class;


    public function store(Request $request){
        return parent::store($request);
    }
}
