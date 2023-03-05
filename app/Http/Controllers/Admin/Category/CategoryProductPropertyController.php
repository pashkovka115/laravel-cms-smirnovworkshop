<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\CategoryProductProperty;
use Illuminate\Http\Request;

class CategoryProductPropertyController extends AdminController
{
    const FOREIGN_FIELD = 'category_id';
    const MODEL = CategoryProductProperty::class;

    public function store(Request $request){
        return parent::store($request);
    }
}
