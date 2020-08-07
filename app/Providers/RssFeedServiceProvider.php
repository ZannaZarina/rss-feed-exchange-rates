<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RssFeedServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\RssFeedReaderService\FeedReaderInterface',
            'App\Services\RssFeedReaderService\ExchangeRateFeedReader'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
