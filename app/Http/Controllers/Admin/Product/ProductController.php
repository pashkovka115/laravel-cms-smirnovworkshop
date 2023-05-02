<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Property;
use App\Models\Product\Attributes\Value;
use App\Models\Product\Product;
use App\Models\Product\ProductAdditionalFields;
use App\Models\Product\ProductColumns;
use App\Models\Product\ProductImages;
use App\Models\Product\ProductTabs;
use Route;

class ProductController extends Controller
{
    const IMAGE_PATH = 'products';


    public function index()
    {
        return view('admin.product.index', [
            'tabs' => ProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => ProductColumns::column_meta_sort_list(),
            'items' => Product::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.product.create', [
            'columns' => ProductColumns::column_meta_sort_single(),
            'items_with_children' => CategoryProduct::with('children')->whereNull('parent_id')->get(),
            'existing_fields' => $this->getFieldsModel(Product::class),
            'excluded_fields' => ['additional_fields']
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $data = $this->base_fields($request, self::IMAGE_PATH);
        $data['category_id'] = $request['category_id'];
        $product = Product::create($data);

        return $this->redirectAdmin($request, 'product', $product->id);
    }


    public function edit($id)
    {
        $product = Product::with([
            'additionalFields',
            'properties',
            'options',
            'gallery',
            'langAll'
        ])->where('id', $id)->firstOrFail();

        dd($product);

        return view('admin.product.edit', [
            // редактируемый объект
            'item' => $product,
            // Наследуемые объекты
            'items' => Product::whereNull('parent_id')->whereNot('id', $id)->get(['id', 'name']),
            // Категории
            'items_with_children' => CategoryProduct::with('children')
                ->whereNull('parent_id')
                ->get(),
            // Вкладки
            'tabs' => ProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            // Колонки(поля)
            'columns' => ProductColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        /*
         * Работа с опциями
         */
        $this->updateOptions($request, $id, Option::class, Value::class);
        /*
         * Работа со свойствами
         */
        $this->updateProperties($request, Property::class);
        /*
         * Удаляем изображения из галереи
         */
        $this->deleteGallery($request, 'delete_gallery', ProductImages::class);
        /*
         * Сохраняем галерею
         */
        $this->saveGallary($request, 'img_gallery', 'product_id', $id, ProductImages::class);
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, ProductColumns::class);

        /*
         * Работа с дополнительными полями
         */
        $this->updateAdditionalFields($request, 'product_id', $id, ProductAdditionalFields::class);

        /*
         * Работа с товаром
         */
        $product = Product::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);
        if ($request->has('category_id')) {
            $data['category_id'] = $request->input('category_id');
        }

        if (is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }

        if ($request->has('delete_img_announce')) {
            if (file_exists(base_path('public/storage/' . $product->img_announce))) {
                unlink(base_path('public/storage/' . $product->img_announce));
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists(base_path('public/storage/' . $product->img_detail))) {
                unlink(base_path('public/storage/' . $product->img_detail));
            }
            $data['img_detail'] = '';
        }

        $product->update($data);

        return $this->redirectAdmin($request, 'product', $id);
    }


    public function destroy($id)
    {
        Product::destroy($id);

        return back();
    }
}
