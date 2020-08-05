<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Services\ExchangeRateFeedReader;
use App\Services\FeedRequest;
use App\Services\FeedService;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;

class AllCurrenciesController extends Controller
{
    public function __invoke()
    {
        Currency::truncate();

        $items = Feeds::make('https://www.bank.lv/vk/ecb_rss.xml')->get_items();
        $feedService = new FeedService(new ExchangeRateFeedReader());
        $feedRequest = new FeedRequest($items);
        $feedResponse = $feedService->execute($feedRequest);
        $results = $feedResponse->getResult()->toJson();

        return view('home', ['results' => $results]);
    }

}
