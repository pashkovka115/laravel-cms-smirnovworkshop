<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductColumns;
use Illuminate\Http\Request;

class ProductColumnController extends Controller
{
    public function update(Request $request)
    {
//        $request->dd();
        foreach ($request->all() as $id => $column){
            if ($id != '_token') {
                $item = [
                    'show_name' => $column['show_name'],
                    'sort_list' => $column['sort_list'],
                    'sort_single' => $column['sort_single'],
                    'is_show_anons' => isset($column['is_show_anons']) ? 1 : 0,
                    'is_show_single' => isset($column['is_show_single']) ? 1 : 0,
                    'tab_id' => $column['tab_id'],
                ];

                ProductColumns::where('id', (int)$id)->update($item);
            }
        }

        return back();
    }
}
