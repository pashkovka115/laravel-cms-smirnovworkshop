<?php

namespace App\Http\Controllers;

use App\Models\ProductColumns;
use App\Models\ProductImages;
use App\Models\ProductProperty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function save_img(Request $request, $field_name, $path = '', $disk = 'public')
    {
        if ($request->has($field_name) and $request->file($field_name)) {
            $subdir = substr(md5(microtime()), mt_rand(0, 30), 2) . '/' . substr(md5(microtime()), mt_rand(0, 30), 2);
            return $request->file($field_name)->store("uploads/$subdir/" . $path, $disk);
        }

        return false;
    }

    /**
     * @param Request $request
     * @param string $path_save_img
     * @return array
     * Возвращает базовый для всех таблиц заполненный масив полей
     * и сохраняет изображения если они были переданы.
     */
    public function base_fields(Request $request, string $path_save_img = '')
    {
        if ($path_save_img) {
            $path_img_announce = $this->save_img($request, 'img_announce', $path_save_img);
            $path_img_detail = $this->save_img($request, 'img_detail', $path_save_img);
        }

        /*
         * Обязательные поля для всех публичных страниц
         */
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'announce' => $request->announce,
            'description' => $request->description,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'name_lavel' => $request->name_lavel,
        ];

        if ($path_save_img) {
            $data['img_announce'] = $path_img_announce;
            $data['img_detail'] = $path_img_detail;
        }

        return $data;
    }


    /**
     * @param Request $request
     * @return void
     * Обновить сортировку полей.
     */
    protected function updateOrder(Request $request, string $model)
    {
        // поля сортировки
        $white_list = [
            'id',
            'name',
            'slug',
            'title',
            'meta_keywords',
            'meta_description',
            'name_lavel',
            'img_announce',
            'img_detail',
            'announce',
            'description',
            'created_at',
            'updated_at',
            'actions_column',
            'img_gallery',
        ];

        $fields = $request->all();
        $sort = 0;
        foreach ($fields as $field => $value) {
            if (in_array($field, $white_list)) {
                $sort += 100;
                $model::where('origin_name', $field)->update(['sort_single' => $sort]);
            }
        }
    }

    /**
     * @param Request $request
     * @param $item_name_for_route
     * @param $item_id
     * @return \Illuminate\Http\RedirectResponse|void
     * При правильном определении кнопок отправки формы в рамках админки
     * перенаправляет на соответствующий маршрут в конце действия в контроллере.
     */
    protected function redirectAdmin(Request $request, $item_name_for_route, $item_id)
    {
        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.' . $item_name_for_route . '.edit', ['id' => $item_id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.' . $item_name_for_route);
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.' . $item_name_for_route . '.create');
        }
    }


    /**
     * @param Request $request
     * @param $request_field
     * @param $foreign_key
     * @param $item_id
     * @param string $model
     * @return void
     * Сохраняет масив изображений
     */
    protected function saveGallary(Request $request, $request_field, $foreign_key, $item_id, string $model)
    {
        if ($request->has($request_field) and is_array($request->file($request_field))) {
            $sort = 0;
            foreach ($request->file($request_field) as $img) {
                $model::create([
                    $foreign_key => $item_id,
                    'sort' => $sort += 10,
                    'src' => $img->store('uploads/' . $foreign_key . '/' . $item_id, 'public')
                ]);
            }
        }
    }


    protected function deleteGallery(Request $request, $request_field, string $model){
        if ($request->has($request_field) and $request->input($request_field)){
            $model::whereIn('src', $request->input($request_field))->delete();
            foreach ($request->input($request_field) as $path){
                if (file_exists(base_path('public/storage/' . $path))){
                    unlink(base_path('public/storage/' . $path));
                }
            }
        }
    }


    protected function updateProperties(Request $request, $foreign_key, $item_id, $model)
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
                    $foreign_key => $item_id,
                    'name' => $data_properties['name'][$key],
                    'type' => $data_properties['type'][$key],
                    'key' => $data_properties['key'][$key],
                    'value' => $data_properties['value'][$key],
                ];
            }

            DB::transaction(function () use ($foreign_key, $item_id, $new_props, $model) {
                $model::where($foreign_key, $item_id)->delete();
                $model::insert($new_props);
            });

        }
    }
}
