<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductsRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct;
use App\Models\CategoryProductColumns;
use App\Models\CategoryProductProperty;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    const IMAGE_PATH = 'product_category';


    public function index()
    {
        return view('admin.category.index', [
            'columns' => CategoryProductColumns::column_meta_sort_list(),
            'items' => CategoryProduct::with('children')->paginate()
        ]);
    }


    public function create()
    {
        return view('admin.category.create', [
            'columns' => CategoryProductColumns::column_meta_sort_single(),
            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
        ]);
    }


    public function store(StoreCategoryProductRequest $request)
    {
        $category = CategoryProduct::create($this->base_fields($request, self::IMAGE_PATH));

        $this->redirectAdmin($request, 'product_category', $category->id);
    }


    public function edit($id)
    {
        return view('admin.category.edit', [
            'items_with_children' => CategoryProduct::with('children')
                ->whereNull('parent_id')
                ->orderBy('sort')
                ->get(),
            'item' => CategoryProduct::where('id', $id)->firstOrFail(),
            'columns' => CategoryProductColumns::column_meta_sort_single(),
            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
        ]);
    }


    public function update(UpdateCategoryProductsRequest $request, $id)
    {
        /*
         * Обновляем сортировку
         */
        $this->updateOrder($request, CategoryProductColumns::class);

        /*
         * Работа со свойствами
         */
        $this->updateProperties($request, 'category_id', $id, CategoryProductProperty::class);

        /*
         * Работа с категорией
         */
        $category = CategoryProduct::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        if (is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }

        if ($request->has('delete_img_announce')) {
            if (file_exists('storage/' . $category->img_announce)) {
                unlink('storage/' . $category->img_announce);
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists('storage/' . $category->img_detail)) {
                unlink('storage/' . $category->img_detail);
            }
            $data['img_detail'] = '';
        }

        $category->update($data);

        return $this->redirectAdmin($request, 'product_category', $id);
    }


    public function destroy($id)
    {
        CategoryProduct::destroy($id);

        return back();
    }
}
