<?php

namespace App\Included\Classes;

use App\Models\Currency;

class CurrencyConversion
{
    public static function convert($sum, $originCurrencyCode = 'RUB', $targetCurrencyCode = null)
    {
        $originCurrency = Currency::where('code', $originCurrencyCode)->first();
        if (is_null($targetCurrencyCode)){
            $targetCurrencyCode = session('currency', 'RUB');
        }
        $targetCurrency = Currency::where('code', $targetCurrencyCode)->first();

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }
}
