<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function save_img(Request $request, $field_name, $path = '', $disk = 'public')
    {
        if ($request->has($field_name)) {
            return $request->file($field_name)->store('uploads/' . $path, $disk);
        }

        return null;
    }
}
