<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryProductsRequest;
use App\Models\CategoryProduct;
use App\Models\CategoryProductColumns;
use App\Models\CategoryProductProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const IMAGE_PATH = 'users';


    public function index()
    {
        return view('admin.user.index', [
            'items' => User::all(),
        ]);
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'avatar' => ['nullable|image']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.user.edit', ['id' => $user->id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.user');
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.user.create');
        }
    }


    public function edit($id)
    {
        return view('admin.user.edit', [
            'item' => User::where('id', $id)->firstOrFail(),
        ]);
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => ['required','string'],
            'email' => ['required', 'email'],
            'password_old' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        dd($data);

        /*if ($request->has('delete_img_detail')) {
            if (file_exists('storage/' . $item->img_detail)) {
                unlink('storage/' . $item->img_detail);
            }
            $data['img_detail'] = '';
        }*/

        $item->update($data);

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
        User::destroy($id);

        return back();
    }
}
