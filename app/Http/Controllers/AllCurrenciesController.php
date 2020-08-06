<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AllCurrenciesController extends Controller
{
    public function __invoke()
    {
        Artisan::call('rss:read');

        $lastDateOfUpdate = DB::table('currencies')->value('date');
        $results = Currency::OneDayRates($lastDateOfUpdate)->get();

        return view('home', ['results' => $results]);
    }
}
