<?php

namespace Framework\Http;

use Exception;

class HttpException extends Exception
{
    protected $statusCode = 400;

    public function withStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function statusCode()
    {
        return $this->statusCode;
    }
}