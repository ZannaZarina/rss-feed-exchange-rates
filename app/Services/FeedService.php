<?php

namespace App\Services;

class FeedService
{
    private FeedReaderInterface $feedReader;

    public function __construct(FeedReaderInterface $feedReader)
    {
        $this->feedReader = $feedReader;
    }

    public function execute(FeedRequest $feedRequest): FeedResponse
    {
        $result = $this->feedReader->handle($feedRequest->getItems());

        return new FeedResponse($result);
    }
}
