<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductColumns;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'columns' => CategoryProductColumns::column_meta_sort_list(),
            'categories' => CategoryProduct::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.category.create', [
            'columns' => CategoryProductColumns::column_meta_sort_single(),
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'slug' => ['nullable', 'string'],
            'announce' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'title' => ['nullable', 'string'],
            'name_lavel' => ['nullable', 'string'],
            'img_announce' => ['nullable', 'image'],
            'img_detail' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $path_img_announce = $this->save_img($request, 'img_announce', 'product_category');
        $path_img_detail = $this->save_img($request, 'img_detail', 'product_category');

        $category = CategoryProduct::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'announce' => $request->announce,
            'description' => $request->description,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'name_lavel' => $request->name_lavel,
            'img_announce' => $path_img_announce,
            'img_detail' => $path_img_detail
        ]);

        if ($request->has('save_and_edit')){
            return redirect()->route('admin.product.category.edit', ['id' => $category->id]);
        }elseif ($request->has('save_and_back')){
            return redirect()->route('admin.product.category');
        }elseif ($request->has('save_and_new')){
            return redirect()->route('admin.product.category.create');
        }
    }


    /*public function show(CategoryProduct $category)
    {
        //
    }*/


    public function edit(CategoryProduct $category)
    {
        //
    }


    public function update(Request $request, CategoryProduct $category)
    {
        //
    }


    public function destroy(CategoryProduct $category)
    {
        //
    }
}
