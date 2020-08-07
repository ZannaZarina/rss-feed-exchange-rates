<?php

namespace App\Services\RssFeedReaderService;

class FeedService
{
    private FeedReaderInterface $feedReader;

    public function __construct(FeedReaderInterface $feedReader)
    {
        $this->feedReader = $feedReader;
    }

    public function execute(array $items)
    {
        return $this->feedReader->handle($items);
    }
}
