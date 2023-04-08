<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\PageAdditionalFields;
use Illuminate\Http\Request;

class PageAdditionalFieldsController extends AdminController
{
    const FOREIGN_FIELD = 'page_id';
    const MODEL = PageAdditionalFields::class;
    const TABLE = 'page_additional_fields';


    public function store(Request $request){
        return parent::store($request);
    }
}
