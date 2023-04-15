<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $product = Product::with('attributeGroups')->where('id', 1)->firstOrFail();
        /*dd(
            $product->name,
            $product->attributeGroups[0]->name,
            $product->attributeGroups[0]->attributes[0]->name,
            $product->attributeGroups[0]->attributes[0]->values[0]->name,
        );*/

        return view('admin.attributes.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
