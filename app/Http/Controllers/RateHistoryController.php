<?php

namespace App\Http\Controllers;

use App\Currency;

class RateHistoryController extends Controller
{
    public function __invoke(Currency $currency)
    {
        $currencyRates = Currency::RateHistory($currency->currency)->reorder('date', 'desc')->get()->toJson();

        return view('history', [
            'currencyRates' => $currencyRates,
        ]);
    }
}
