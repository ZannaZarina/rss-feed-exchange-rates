<?php

namespace App\Services\RssFeedReaderService;

use App\Currency;

class ExchangeRateFeedReader implements FeedReaderInterface
{
    public function handle(array $items)
    {
        foreach ($items as $item) {
            $description = explode(' ', $item->get_description());
            $date = date('Y-m-d', strtotime($item->get_date()));

            for ($i = 0; $i < count($description) - 1; $i += 2) {
                Currency::updateOrCreate([
                    'currency' => $description[$i],
                    'rate' => $description[$i + 1],
                    'date' => $date
                ]);
            }
        }
    }
}

