<?php

namespace App\Console\Commands;

use App\Services\ExchangeRateFeedReader;
use App\Services\FeedRequest;
use App\Services\FeedService;
use Illuminate\Console\Command;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;

class ReadRssFeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read RSS feed and save data to database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Feeds::make('https://www.bank.lv/vk/ecb_rss.xml')->get_items();
        $feedService = new FeedService(new ExchangeRateFeedReader());
        $feedRequest = new FeedRequest($items);
        $feedResponse = $feedService->execute($feedRequest);
        $feedResponse->getResult();
    }
}
