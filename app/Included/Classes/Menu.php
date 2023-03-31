<?php

namespace App\Included\Classes;

class Menu
{
    public static function name($name)
    {
        $menu = \App\Models\Menu::with('items')
            ->where('name', $name)
            ->firstOrFail();

        return view('site.mycomponents.menu', compact('menu'));
    }
}
