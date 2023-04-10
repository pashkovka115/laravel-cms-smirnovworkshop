<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\CategoryProduct\CategoryProductAdditionalFields;
use Illuminate\Http\Request;

class CategoryProductAdditionalFieldsController extends AdminController
{
    const FOREIGN_FIELD = 'category_id';
    const MODEL = CategoryProductAdditionalFields::class;
    const TABLE = 'categories_product_additional_fields';

    public function store(Request $request){
        return parent::store($request);
    }
}
