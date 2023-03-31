<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\PageProperty;
use Illuminate\Http\Request;

class PagePropertyController extends AdminController
{
    const FOREIGN_FIELD = 'page_id';
    const MODEL = PageProperty::class;
    const TABLE = 'page_properties';


    public function store(Request $request){
        return parent::store($request);
    }
}
