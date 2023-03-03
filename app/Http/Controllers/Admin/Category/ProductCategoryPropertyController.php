<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductColumns;
use App\Models\CategoryProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryPropertyController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'type' => 'nullable|string',
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $property = new CategoryProductProperty();
        $property->category_id = $request->input('category_id');
        $property->type = $request->input('type') ?? '';
        $property->key = $request->input('key');
        $property->value = $request->input('value') ?? '';
        $property->save();

        return back();
    }
}
