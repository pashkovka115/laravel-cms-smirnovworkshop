<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function saveOrderBlocks(Request $request)
    {
        return json_encode($request->all());
    }
}
