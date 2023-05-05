<?php

namespace Framework\Routing;

class Route
{
    protected $name;

    public function __construct(
        protected $method,
        protected $path,
        protected $handler

    ) {
    }

    public function map(string $method, string $path, array|callable $handler)
    {
        return new self(method: $method, path: $path, handler: $handler);
    }

    public function name(string $name)
    {
        $this->name = $name;
    }

    public function get($path, $handler)
    {
        return $this->map(method: 'GET', path: $path, handler: $handler);
    }

    public function post($path, $handler)
    {
        return $this->map(method: 'POST', path: $path, handler: $handler);
    }

    public function put($path, $handler)
    {
        return $this->map(method: 'PUT', path: $path, handler: $handler);
    }

    public function patch($path, $handler)
    {
        return $this->map(method: 'PATCH', path: $path, handler: $handler);
    }

    public function options($path, $handler)
    {
        return $this->map(method: 'OPTIONS', path: $path, handler: $handler);
    }

    public function head($path, $handler)
    {
        return $this->map(method: 'HEAD', path: $path, handler: $handler);
    }

    public function delete($path, $handler)
    {
        return $this->map(method: 'DELETE', path: $path, handler: $handler);
    }

    public function toArray()
    {
        return [
            'method' => $this->method,
            'path' => $this->path,
            'handler' => $this->handler,
        ];
    }
}
