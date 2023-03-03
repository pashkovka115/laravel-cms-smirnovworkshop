<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function save_img(Request $request, $field_name, $path = '', $disk = 'public')
    {
        if ($request->has($field_name)) {
            return $request->file($field_name)->store('uploads/' . $path, $disk);
        }

        return null;
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
        if ($path_save_img){
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

        if ($path_save_img){
            $data['img_announce'] = $path_img_announce;
            $data['img_detail'] = $path_img_detail;
        }

        return $data;
    }
}
