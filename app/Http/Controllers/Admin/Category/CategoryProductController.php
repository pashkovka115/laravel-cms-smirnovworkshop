<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryProductRequest;
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
            'categories' => CategoryProduct::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.category.create', [
            'columns' => CategoryProductColumns::column_meta_sort_single(),
        ]);
    }


    public function store(StoreCategoryProductRequest $request)
    {
        $category = CategoryProduct::create($this->base_fields($request, self::IMAGE_PATH));

        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.product.category.edit', ['id' => $category->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.product.category');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.product.category.create');
        }
    }


    public function edit($id)
    {
        return view('admin.category.edit', [
            'item' => CategoryProduct::where('id', $id)->firstOrFail(),
            'columns' => CategoryProductColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        /*
         * Работа со свойствами
         */
        if ($request->has('properties')) {
            $data_properties = $request->input('properties');
            foreach ($data_properties as $field => $property) {
                if (isset($data_properties['delete_property']) and count($data_properties['delete_property']) > 0) {
                    foreach ($data_properties['delete_property'] as $index) {
                        if ($field != 'delete_property') {
                            unset($data_properties[$field][$index]);
                        }

                    }
                }
            }
            unset($data_properties['delete_property']);

            $new_props = [];
            foreach ($data_properties['key'] as $key => $value) {
                $new_props[] = [
                    'category_id' => $id,
                    'name' => $data_properties['name'][$key],
                    'type' => $data_properties['type'][$key],
                    'key' => $data_properties['key'][$key],
                    'value' => $data_properties['value'][$key],
                ];
            }

            DB::transaction(function () use ($id, $new_props){
                CategoryProductProperty::where('category_id', $id)->delete();
                CategoryProductProperty::insert($new_props);
            });
        }

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

        /*
         * Перенаправляем взависимости от нажатой кнопки
         */
        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.product_category.edit', ['id' => $id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.product_category');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.product_category.create');
        }
    }


    public function destroy($id)
    {
        CategoryProduct::destroy($id);

        return back();
    }
}
