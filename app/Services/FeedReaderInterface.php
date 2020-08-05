<?php

namespace App\Services;

interface FeedReaderInterface
{
    public function handle(array $items);
}
