<?php

namespace App\Services;

use App\Currency;
use Carbon\Carbon;

class ExchangeRateFeedReader implements FeedReaderInterface
{
    public function handle(array $items)
    {
        foreach ($items as $item) {
            $description = explode(' ', $item->get_description());
            $date = date('Y-m-d', strtotime($item->get_date()));

            for ($i = 0; $i < count($description) - 1; $i += 2) {
                Currency::create([
                    'currency' => $description[$i],
                    'rate' => $description[$i + 1],
                    'date' => $date
                ]);
            }
        }

        $lastDateOfUpdate = date('Y-m-d', strtotime($items[0]->get_date()));

        $mainDateToShow = Carbon::today()->format('Y-m-d');

        $x = 0;
        while ($lastDateOfUpdate !== $mainDateToShow) {
            $mainDateToShow = Carbon::today()->subDays($x++)->format('Y-m-d');
        }
        return Currency::OneDayRates($mainDateToShow)->get();

    }
}

