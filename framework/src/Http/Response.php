<?php

namespace Framework\Http;

class Response
{
    public function __construct(
        protected ?string $content = '',
        protected int $status = 200,
        protected array $headers = [],
    ) {
        http_response_code($status);
    }

    public function send()
    {
        echo $this->content;
    }
}
