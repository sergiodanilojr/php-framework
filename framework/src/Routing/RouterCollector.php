<?php

namespace Framework\Routing;

final class RouterCollector
{
    public static $instance;

    protected array $routes = [];


    public function routes()
    {
        return $this->routes;
    }

    public function addRoute(string $method, $path, $handler): never
    {
        $route = new Route(method: $method, path: $path, handler: $handler);
        $this->routes[$path] = array_values($route->toArray());
    }
}
