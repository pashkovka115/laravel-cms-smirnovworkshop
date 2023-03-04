<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductColumns;
use App\Models\CategoryProductProperty;
use App\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductPropertyController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'type' => 'nullable|string',
            'key' => 'required|string|unique:product_properties',
            'value' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $property = new ProductProperty();
        $property->product_id = $request->input('product_id');
        $property->type = $request->input('type') ?? '';
        $property->key = $request->input('key');
        $property->value = $request->input('value') ?? '';
        $property->save();

        return back();
    }
}
