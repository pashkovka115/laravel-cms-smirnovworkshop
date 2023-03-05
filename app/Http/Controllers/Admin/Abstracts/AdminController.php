<?php

namespace App\Http\Controllers\Admin\Abstracts;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductProperty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

abstract class AdminController extends Controller
{
    /**
     * @const MODEL - Модель.
     * @const FOREIGN_FIELD - Поле в таблице, связь с родительской таблицей.
     */
    public function __construct()
    {
        if (!defined('static::MODEL'))
        {
            throw new Exception('Константа MODEL не определена в подклассе ' . get_class($this));
        }
        if (!defined('static::FOREIGN_FIELD'))
        {
            throw new Exception('Константа FOREIGN_FIELD не определена в подклассе ' . get_class($this));
        }
    }


    public function store(Request $request)
    {
        $input_key = $request->input('key');
        $input_category_id = $request->input(static::FOREIGN_FIELD);

        $validator = Validator::make($request->all(), [
            static::FOREIGN_FIELD => 'required',
            'name' => 'nullable|string',
            'type' => 'nullable|string',
            'key' => [ // проверка по двум полям
                'required',
                'string',
                Rule::unique('categories_product_property')->where(function ($query) use ($input_key, $input_category_id) {
                    return $query->where('key', $input_key)
                        ->where(static::FOREIGN_FIELD, $input_category_id);
                }),
            ],
            'value' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $property = new (static::MODEL)();
        $property->{static::FOREIGN_FIELD} = $request->input(static::FOREIGN_FIELD);
        $property->name = $request->input('name') ?? '';
        $property->type = $request->input('type') ?? '';
        $property->key = $request->input('key');
        $property->value = $request->input('value') ?? '';
        $property->save();

        return back();
    }
}
