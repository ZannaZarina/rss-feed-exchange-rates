<?php

namespace App\Services;

class FeedResponse
{
    private array $result;

    public function __construct(array $result)
    {
        $this->result = $result;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
