<?php

namespace Framework\Http;

class Request
{
    public function __construct(
        protected readonly array $getParams,
        protected readonly array $postParams,
        protected readonly array $cookie,
        protected readonly array $server,

    )
    {
        
    }

    public static function capture()
    {
        return new static($_GET, $_POST, $_COOKIE, $_SERVER);
    }

    public function method()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function pathInfo()
    {
        return strtok($this->server['REQUEST_URI'], "?");
    }
}