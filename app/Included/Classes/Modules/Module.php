<?php

namespace App\Included\Classes\Modules;

use App\Http\Controllers\Admin\Category\CategoryProductController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Http\Request;

class Module
{
    public function index($module)
    {

    }


    public function create($module)
    {

    }


    public function store($module, Request $request)
    {

    }


    public function edit($module, $id)
    {
        $module_name = ucfirst(strtolower($module));
        $namespace = 'App\\Http\\Controllers\\Admin\\' . $module_name;
        $controller = $namespace . '\\' . $module_name . 'Controller';

//        dd($module, $id, $controller);

//        $obj = new ProductController();
        $obj = new $controller();
        return $obj->edit($id);

    }


    public function update($module, Request $request, $id)
    {

    }


    public function destroy($module, $id)
    {

    }
}
