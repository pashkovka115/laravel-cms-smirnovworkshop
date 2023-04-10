<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct\CategoryProductColumns;
use Illuminate\Http\Request;

class CategoryProductColumnController extends Controller
{
    public function update(Request $request)
    {
        foreach ($request->all() as $id => $column){
            if ($id != '_token') {
                $item = [
                    'show_name' => $column['show_name'],
                    'sort_list' => $column['sort_list'],
                    'sort_single' => $column['sort_single'],
                    'is_show_anons' => isset($column['is_show_anons']) ? 1 : 0,
                    'is_show_single' => isset($column['is_show_single']) ? 1 : 0,
                ];

                CategoryProductColumns::where('id', (int)$id)->update($item);
            }
        }

        return back();
    }
}
