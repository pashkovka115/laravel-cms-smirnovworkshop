<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductColumns;
use Illuminate\Http\Request;

class ProductCategoryColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
