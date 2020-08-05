<?php

namespace App\Services;

class FeedResponse
{
    private Object $result;

    public function __construct(Object $result)
    {
        $this->result = $result;
    }

    public function getResult(): Object
    {
        return $this->result;
    }
}
