<?php

namespace App\Servises\Localization;

use App\Models\Language;

class Localization
{
    public function locale()
    {
        if (!app()->runningInConsole()) {
            $baseLocale = Language::where('base', true)->first();
            $locale = request()->segment(1, '');
            $languages = Language::all();
            $codes = [];
            foreach ($languages as $language) {
                $codes[] = $language->code;
            }

            if ($locale and in_array($locale, $codes)) {
                session(['locale' => $locale]);
                \App::setLocale($locale);

                return $locale;
            } else {
                session(['locale' => $baseLocale->code]);
                \App::setLocale($baseLocale->code);

                return '';
            }
        }
    }
}
