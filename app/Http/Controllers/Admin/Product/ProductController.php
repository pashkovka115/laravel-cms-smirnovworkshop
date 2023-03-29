<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductColumns;
use App\Models\ProductImages;
use App\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    const IMAGE_PATH = 'products';


    public function index()
    {
        return view('admin.product.index', [
            'columns' => ProductColumns::column_meta_sort_list(),
            'items' => Product::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.product.create', [
            'columns' => ProductColumns::column_meta_sort_single(),
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($this->base_fields($request, self::IMAGE_PATH));

        return $this->redirectAdmin($request, 'product', $product->id);

        /*if ($request->has('save_and_edit')) {
            return redirect()->route('admin.product.edit', ['id' => $product->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.product');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.product.create');
        }*/
    }


    public function edit($id)
    {
        return view('admin.product.edit', [
            'item' => Product::where('id', $id)->firstOrFail(),
            'columns' => ProductColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        /*
         * Сохраняем галерею
         */
        $this->saveGallary($request, 'img_gallery', 'product_id', $id, ProductImages::class);
        // todo: Реализовать удаление из галереи
        /*
         * Сортировка
         */
        $this->updateOrder($request, ProductColumns::class);

        /*
         * Работа со свойствами
         */
        $this->updateProperties($request, 'product_id', $id, ProductProperty::class);

        /*
         * Работа с товаром
         */
        $product = Product::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        if (is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }
        /*if (is_null($data['img_gallery'])) {
            unset($data['img_gallery']);
        }*/

        if ($request->has('delete_img_announce')) {
            if (file_exists('storage/' . $product->img_announce)) {
                unlink('storage/' . $product->img_announce);
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists('storage/' . $product->img_detail)) {
                unlink('storage/' . $product->img_detail);
            }
            $data['img_detail'] = '';
        }

        /*if ($request->has('img_gallery')) {
            if (file_exists('storage/' . $product->img_detail)) {
                unlink('storage/' . $product->img_detail);
            }
            $data['img_detail'] = '';
        }*/

        $product->update($data);

        return $this->redirectAdmin($request, 'product', $id);
    }


    public function destroy($id)
    {
        Product::destroy($id);

        return back();
    }

    /*private function saveGallary(Request $request, $request_field, $foreign_key, $item_id, string $model)
    {
        if ($request->has($request_field)){
            $sort = 0;
            foreach ($request->file($request_field) as $img){
                $model::create([
                    $foreign_key => $item_id,
                    'sort' => $sort += 10,
                    'src' => $img->store('uploads/products/'.$item_id, 'public')
                ]);
            }
        }
    }*/


    /*private function redirectAdmin(Request $request, $item_name_for_route, $item_id)
    {
        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.'.$item_name_for_route.'.edit', ['id' => $item_id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.'.$item_name_for_route);
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.'.$item_name_for_route.'.create');
        }
    }*/


    /*private function updateProperties(Request $request, $product_id)
    {
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
                    'product_id' => $product_id,
                    'name' => $data_properties['name'][$key],
                    'type' => $data_properties['type'][$key],
                    'key' => $data_properties['key'][$key],
                    'value' => $data_properties['value'][$key],
                ];
            }

            DB::transaction(function () use ($product_id, $new_props) {
                ProductProperty::where('product_id', $product_id)->delete();
                ProductProperty::insert($new_props);
            });

        }
    }*/
}
