<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Support\Facades\DB;

class ShowAllCurrenciesController extends Controller
{
    public function __invoke()
    {
        $lastDateOfUpdate = DB::table('currencies')->orderBy('date', 'DESC')
            ->value('date');
        $currentRates = Currency::OneDayRates($lastDateOfUpdate)->get();

        return view('home', ['currentRates' => $currentRates]);
    }
}
