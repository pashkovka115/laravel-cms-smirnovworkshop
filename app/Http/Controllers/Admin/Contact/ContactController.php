<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Models\Contact;
use App\Models\ContactColumns;
use App\Models\ContactProperty;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    const IMAGE_PATH = 'contact';


    public function index()
    {
        return view('admin.contact.index', [
            'columns' => ContactColumns::column_meta_sort_list(),
            'items' => Contact::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.contact.create', [
            'columns' => ContactColumns::column_meta_sort_single(),
        ]);
    }


    public function store(StoreContactsRequest $request)
    {
        $category = Contact::create($this->base_fields($request, self::IMAGE_PATH));

        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.contact.edit', ['id' => $category->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.contact');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.contact.create');
        }
    }


    public function edit($id)
    {
        return view('admin.contact.edit', [
            'item' => Contact::where('id', $id)->firstOrFail(),
            'columns' => ContactColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateContactsRequest $request, $id)
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
                    'contact_id' => $id,
                    'is_show' => isset($data_properties['is_show'][$key]) ? 1 : 0,
                    'name' => $data_properties['name'][$key],
                    'type' => $data_properties['type'][$key],
                    'key' => $data_properties['key'][$key],
                    'value' => $data_properties['value'][$key],
                ];
            }

            DB::transaction(function () use ($id, $new_props){
                ContactProperty::where('contact_id', $id)->delete();
                ContactProperty::insert($new_props);
            });

        }

        /*
         * Работа с категорией
         */
        $category = Contact::where('id', $id)->firstOrFail();

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
            return redirect()->route('admin.contact.edit', ['id' => $id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.contact');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.contact.create');
        }
    }


    public function destroy($id)
    {
        Contact::destroy($id);

        return back();
    }
}
