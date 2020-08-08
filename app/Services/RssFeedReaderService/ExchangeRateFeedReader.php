<?php

namespace App\Services\RssFeedReaderService;

use App\Currency;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;

class ExchangeRateFeedReader implements FeedReaderInterface
{
    public function handle()
    {
        $items = Feeds::make('https://www.bank.lv/vk/ecb_rss.xml')->get_items();

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

