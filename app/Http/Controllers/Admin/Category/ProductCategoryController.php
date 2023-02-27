<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoriesProductColumns;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
//        $columns = CategoriesProductColumns::orderBy('sort')->get()->toArray();
//        $categories = CategoryProduct::paginate();
//        dd($columns, $categories);

        return view('admin.category.index', [
            'columns' => CategoriesProductColumns::orderBy('sort')->get()->toArray(),
            'categories' => CategoryProduct::paginate()
        ]);
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
    public function show(CategoryProduct $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryProduct $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $category)
    {
        //
    }
}
