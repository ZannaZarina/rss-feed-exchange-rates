<?php

namespace App\Console\Commands;

use App\Services\RssFeedReaderService\FeedService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
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
        $feedReader = App::make('App\Services\RssFeedReaderService\FeedReaderInterface');
        $feedService = new FeedService($feedReader);
        return $feedService->execute();
    }
}
