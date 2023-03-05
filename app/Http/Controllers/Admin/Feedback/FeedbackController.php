<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\FeedbackColumns;
use App\Models\FeedbackProperty;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    const IMAGE_PATH = 'feedback';


    public function index()
    {
        return view('admin.feedback.index', [
            'columns' => FeedbackColumns::column_meta_sort_list(),
            'items' => Feedback::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.feedback.create', [
            'columns' => FeedbackColumns::column_meta_sort_single(),
        ]);
    }


    public function store(StoreFeedbackRequest $request)
    {
        $category = Feedback::create($this->base_fields($request, self::IMAGE_PATH));

        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.feedback.edit', ['id' => $category->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.feedback');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.feedback.create');
        }
    }


    public function edit($id)
    {
        return view('admin.feedback.edit', [
            'item' => Feedback::where('id', $id)->firstOrFail(),
            'columns' => FeedbackColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateFeedbackRequest $request, $id)
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
//                dd($data_properties);
                $new_props[] = [
                    'feedback_id' => $id,
                    'is_show' => isset($data_properties['is_show'][$key]) ? 1 : 0,
                    'name' => $data_properties['name'][$key],
                    'type' => $data_properties['type'][$key],
                    'key' => $data_properties['key'][$key],
                    'value' => $data_properties['value'][$key],
                ];
            }

            DB::transaction(function () use ($id, $new_props){
                FeedbackProperty::where('feedback_id', $id)->delete();
                FeedbackProperty::insert($new_props);
            });

        }

        /*
         * Работа с категорией
         */
        $category = Feedback::where('id', $id)->firstOrFail();

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
            return redirect()->route('admin.feedback.edit', ['id' => $id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.feedback');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.feedback.create');
        }
    }


    public function destroy($id)
    {
        Feedback::destroy($id);

        return back();
    }
}
