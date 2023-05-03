<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Property;
use App\Models\Product\Attributes\Value;
use App\Models\Product\ProductAdditionalFields;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SiteController extends Controller
{
    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        \App::setLocale($locale);

        return back();
    }


    public function changeCurrency($currencyCode)
    {
        $currency = Currency::where('code', $currencyCode)->firstOrFail();
        session(['currency' => $currency->code]);

        return back();
    }
}
